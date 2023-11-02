<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Administration\Groups\Create\Add;
use Administration\Groups\Update\Adjust;

class GroupController extends Controller
{
    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Comprueba si el usuario tiene permiso para listar grupos utilizando Gate.
            if (!Gate::allows('system.groups.list')) {
                // Si no tiene permiso, se genera un error 403 (Prohibido) con un mensaje personalizado.
                abort(403, "No estás autorizado para acceder a esta zona");
            }

            return $next($request);
        });
    }

    /**
     * Muestra una lista de recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PAGE_NAVIGATION = "GROUPS";
        // Obtiene y ordena los permisos desde la base de datos.
        $permissions = Permission::orderBy('group')->get();

        // Renderiza la vista 'admin.groups.group_list' y pasa datos a la vista.
        return view('admin.groups.group_list', compact('PAGE_NAVIGATION', 'permissions'));
    }

    /**
     * Devuelve la lista de roles como JSON.
     *
     * @param Request $request
     * @return void
     */
    public function getGroups(Request $request)
    {
        // Obtiene y ordena los roles desde la base de datos, excluyendo el rol con ID 1.
        $roles = Role::where('id', '!=', 1)->orderBy('name')->get(['id', 'name']);

        // Retorna una respuesta JSON con los roles.
        return response()->json(['data'  => $roles]);
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('system.groups.create')) {
            // Si el usuario no tiene permiso para crear grupos, se genera un error 403 (Prohibido) con un mensaje personalizado.
            abort(403, "No estás autorizado para registrar información");
        }

        // Llama al método 'newGroup' del controlador 'Add' para almacenar el nuevo grupo.
        return (new Add($request))->newGroup();
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  \App\Role    $role
     * @return \Illuminate\Http\Response
     */
    public function getInfo(Role $role)
    {
        if (!isset($role->id)) {
            // Si el rol no existe, devuelve una respuesta JSON con 'exito' establecido en false.
            return response()->json(['exito'  => false]);
        } else {
            // Obtiene los permisos y otros datos relacionados al rol y los retorna en una respuesta JSON.
            $permissions = Permission::orderBy('group')->pluck('id');
            return response()->json([
                'exito'             => true,
                'role'              => $role,
                'permissions_role'  => $role->permissions->pluck('id'),
                'permissions'       => $permissions
            ]);
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role    $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if (!Gate::allows('system.groups.edit')) {
            // Si el usuario no tiene permiso para editar grupos, se genera un error 403 (Prohibido) con un mensaje personalizado.
            abort(403, "No estás autorizado para modificar la información");
        }

        // Llama al método 'editGroup' del controlador 'Adjust' para editar el grupo.
        return (new Adjust($request, $role))->editGroup();
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Role    $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!Gate::allows('system.groups.delete')) {
            // Si el usuario no tiene permiso para eliminar grupos, se genera un error 403 (Prohibido) con un mensaje personalizado.
            abort(403, "No estás autorizado para eliminar la información");
        }

        try {
            // Realiza la eliminación del rol dentro de una transacción de base de datos.
            DB::transaction(function() use ($role) {
                $role->delete();
            });

            // Retorna una respuesta JSON con 'exito' establecido en true si la eliminación se realizó con éxito.
            return response()->json(['exito' => true]);
        } catch (Exception $e) {
            // En caso de error, retorna una respuesta JSON con 'exito' establecido en false.
            return response()->json(['exito' => false]);
        }
    }

}

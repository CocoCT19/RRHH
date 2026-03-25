# *Casos de Prueba - Colaboradores*
Estos casos de prueba describen paso a paso lo que los test deben realizar


## *Caso de Prueba#1*

### *ID del Caso de Prueba*

CP-COLABORADOR-001

### *Título de la Prueba*

Creación de un Colaborador Exitoso

### *Módulo / Característica*

Colaboradores – Crear Colaborador

### *Descripción*

Verificar que se puede registrar un colaborador correctamente en el sistema.

### *Precondiciones*

1. Usuario autenticado.
2. Sistema disponible.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo colaboradores.
3. Dirigirse a Nuevo Colaborador.
4. Ingresar los datos correctos de tipo json.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'first_name' => 'Luis',
'last_name' => 'Guerra',
'document_type' => 'CC',
'document_number' => '12345',
'birth_date' => '1990-01-01'
]

### *Resultado Esperado*

Verificar que el colaborador se crea correctamente en la base de datos.

### *Resultado Real*


### *Estado*

PASA



## *Caso de Prueba#2*

### *ID del Caso de Prueba*

CP-COLABORADOR-002

### *Título de la Prueba*

Creación de Colaborador con Documento Duplicado

### *Módulo / Característica*

Colaboradores – Validación de Documento

### *Descripción*

Verificar que el sistema no permite registrar dos colaboradores con el mismo número de documento.

### *Precondiciones*

1. Usuario autenticado.
2. Ya existe un colaborador con el mismo número de documento.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo colaboradores.
3. Dirigirse a Nuevo Colaborador.
4. Ingresar los datos con un número de documento ya existente.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'first_name' => 'Luis',
'last_name' => 'Guerra',
'document_type' => 'CC',
'document_number' => '12345',
'birth_date' => '1990-01-01'
]

### *Resultado Esperado*

Verificar que el sistema muestra un error de validación y no permite crear el colaborador.

### *Resultado Real*


### *Estado*

PASA


## *Caso de Prueba#3*

### *ID del Caso de Prueba*

CP-COLABORADOR-003

### *Título de la Prueba*

Actualización de un Colaborador Existente

### *Módulo / Característica*

Colaboradores – Actualizar Colaborador

### *Descripción*

Verificar que se puede actualizar la información de un colaborador existente.

### *Precondiciones*

1. Usuario autenticado.
2. Colaborador existente en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo colaboradores.
3. Seleccionar un colaborador existente.
4. Modificar los datos del colaborador.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'first_name' => 'Carlos',
'last_name' => 'Perez'
]

### *Resultado Esperado*

Verificar que el colaborador se actualiza correctamente en la base de datos.

### *Resultado Real*


### *Estado*

PASA



## *Caso de Prueba#4*

### *ID del Caso de Prueba*

CP-COLABORADOR-004

### *Título de la Prueba*

Listado de Colaboradores

### *Módulo / Característica*

Colaboradores – Listar Colaboradores

### *Descripción*

Verificar que el sistema permite consultar el listado de colaboradores registrados.

### *Precondiciones*

1. Usuario autenticado.
2. Existen colaboradores registrados en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo colaboradores.
3. Consultar el listado de colaboradores.

### *Datos de Entrada*

json

[
'cantidad_colaboradores' => 3
]

### *Resultado Esperado*

Verificar que el sistema devuelve correctamente la lista de colaboradores registrados.

### *Resultado Real*


### *Estado*

PASA



## *Caso de Prueba#5*

### *ID del Caso de Prueba*

CP-COLABORADOR-005

### *Título de la Prueba*

Eliminación de un Colaborador

### *Módulo / Característica*

Colaboradores – Eliminar Colaborador

### *Descripción*

Verificar que se puede eliminar un colaborador existente del sistema.

### *Precondiciones*

1. Usuario autenticado.
2. Colaborador existente en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo colaboradores.
3. Seleccionar un colaborador existente.
4. Eliminar colaborador.
5. Validación del sistema.

### *Datos de Entrada*

json

[
'id' => 1
]

### *Resultado Esperado*

Verificar que el colaborador se elimina correctamente de la base de datos (soft delete).

### *Resultado Real*


### *Estado*

PASA
# *Casos de Prueba - Contratos*
Estos casos de prueba describen paso a paso lo que los test deben realizar



## *Caso de Prueba#1*

### *ID del Caso de Prueba*

CP-CONTRATO-001

### *Título de la Prueba*

Creación de un Contrato Exitoso

### *Módulo / Característica*

Contratos – Crear Contrato

### *Descripción*

Verificar que se puede crear un contrato y asociarlo a un colaborador existente.

### *Precondiciones*

1. Usuario autenticado.
2. Colaborador existente en la base de datos.

### *Pasos para la Ejecución*
_
1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos correctos de tipo json, incluyendo el ID del colaborador existente.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'collaborator_id' => 1,
'start_date' => '2024-01-01',
'end_date' => '2024-12-31',
'salary' => 2000
]

### *Resultado Esperado*

Verificar que el contrato se crea correctamente en la base de datos y está asociado al colaborador.

### *Resultado Real*


### *Estado*

PASA




## *Caso de Prueba#2*

### *ID del Caso de Prueba*
_
CP-CONTRATO-002

### *Título de la Prueba*

Creación de un Contrato con Colaborador Inexistente

### *Módulo / Característica*

Contratos – Crear Contrato

### *Descripción*

Verificar que no se puede crear un contrato para un colaborador que no existe en la base de datos.

### *Precondiciones*

1. Usuario autenticado.
2. El colaborador no existe en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos de tipo json con un ID de colaborador inexistente.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'collaborator_id' => 999,
'start_date' => '2024-01-01',
'salary' => 2000
]

### *Resultado Esperado*

Verificar que el sistema no permite crear un contrato para un colaborador inexistente y muestra un error de validación.

### *Resultado Real*


### *Estado*

PASA




## *Caso de Prueba#3*

### *ID del Caso de Prueba*

CP-CONTRATO-003

### *Título de la Prueba*

Validación del Salario en la Creación de Contrato

### *Módulo / Característica*

Contratos – Validación de Campos

### *Descripción*

Verificar que el sistema valida correctamente el campo salario y no permite valores negativos.

### *Precondiciones*

1. Usuario autenticado.
2. Colaborador existente en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Dirigirse a Nuevo Contrato.
4. Ingresar los datos de tipo json con salario negativo.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'collaborator_id' => 1,
'start_date' => '2024-01-01',
'salary' => -500
]

### *Resultado Esperado*

Verificar que el sistema no permite crear el contrato y muestra error en el campo salario.

### *Resultado Real*


### *Estado*

PASA




## *Caso de Prueba#4*

### *ID del Caso de Prueba*

CP-CONTRATO-004

### *Título de la Prueba*

Actualización de un Contrato Existente

### *Módulo / Característica*

Contratos – Actualizar Contrato

### *Descripción*

Verificar que se puede actualizar un contrato existente con datos válidos.

### *Precondiciones*

1. Usuario autenticado.
2. Contrato existente en la base de datos.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo contratos.
3. Seleccionar un contrato existente para actualizar.
4. Ingresar los datos correctos de tipo json para actualizar el contrato.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'start_date' => '2024-02-01',
'end_date' => '2024-12-31',
'salary' => 3000
]

### *Resultado Esperado*

Verificar que el contrato se actualiza correctamente en la base de datos.

### *Resultado Real*


### *Estado*

PASA
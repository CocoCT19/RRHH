# *Casos de Prueba - Prórroga de Contratos*
Estos casos de prueba describen paso a paso lo que los test deben realizar


## *Caso de Prueba#1*

### *ID del Caso de Prueba*

CP-PRORROGA-001

### *Título de la Prueba*

Agregar Prórroga a un Contrato Válido

### *Módulo / Característica*

Contratos – Prórroga de Contrato

### *Descripción*

Verificar que se puede agregar una prórroga a un contrato activo.

### *Precondiciones*

1. Usuario autenticado.
2. Colaborador existente en la base de datos.
3. Contrato activo asociado al colaborador.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo de prórrogas.
3. Seleccionar un contrato activo.
4. Ingresar los datos de prórroga en formato json.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'contract_id' => 1,
'extension_type' => 'Tiempo',
'new_end_date' => '2025-12-31'
]

### *Resultado Esperado*

Verificar que la prórroga se registra correctamente en la base de datos asociada al contrato.

### *Resultado Real*


### *Estado*

PASA



## *Caso de Prueba#2*

### *ID del Caso de Prueba*

CP-PRORROGA-002

### *Título de la Prueba*

Actualizar Fecha de Finalización con Prórroga

### *Módulo / Característica*

Contratos – Actualización de Fecha de Fin

### *Descripción*

Verificar que al agregar una prórroga de tipo tiempo se actualiza la fecha de finalización del contrato.

### *Precondiciones*

1. Usuario autenticado.
2. Contrato activo existente.

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo de prórrogas.
3. Seleccionar un contrato activo.
4. Ingresar los datos de prórroga en formato json con una nueva fecha de finalización.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'contract_id' => 1,
'extension_type' => 'Tiempo',
'new_end_date' => '2026-01-01'
]

### *Resultado Esperado*

Verificar que la fecha de finalización del contrato se actualiza correctamente en la base de datos.

### *Resultado Real*


### *Estado*

PASA



## *Caso de Prueba#3*

### *ID del Caso de Prueba*

CP-PRORROGA-003

### *Título de la Prueba*

Intentar Agregar Prórroga a un Contrato Finalizado

### *Módulo / Característica*

Contratos – Validación de Estado del Contrato

### *Descripción*

Verificar que el sistema no permite agregar una prórroga a un contrato que ya está finalizado.

### *Precondiciones*

1. Usuario autenticado.
2. Contrato con estado "Finalizado".

### *Pasos para la Ejecución*

1. Usuario Logueado.
2. Acceder al módulo de prórrogas.
3. Seleccionar un contrato finalizado.
4. Ingresar los datos de prórroga en formato json.
5. Guardar.
6. Validación del sistema.

### *Datos de Entrada*

json

[
'contract_id' => 1,
'extension_type' => 'Tiempo',
'new_end_date' => '2026-01-01'
]

### *Resultado Esperado*

Verificar que el sistema no permite registrar la prórroga y muestra errores de validación.

### *Resultado Real*


### *Estado*

PASA
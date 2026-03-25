# Sistema de Gestión de Recursos Humanos (RRHH)

## Descripción del Proyecto

Este proyecto corresponde al desarrollo de un **Sistema de Gestión de Recursos Humanos** desarrollado con **Laravel**.
El objetivo del sistema es administrar información relacionada con **colaboradores, contratos laborales, prórrogas y terminaciones anticipadas de contratos**.

El proyecto fue desarrollado siguiendo un enfoque de **TDD (Test Driven Development)**, donde cada funcionalidad se implementa para cumplir con los **casos de prueba definidos (CP)**.

Actualmente el sistema permite:

* Registrar colaboradores
* Crear contratos asociados a colaboradores
* Registrar prórrogas de contrato
* Finalizar contratos de manera anticipada
* Validar datos mediante pruebas automatizadas

---

# Tecnologías Utilizadas

* **PHP 8.4**
* **Laravel 11**
* **MariaDB / MySQL**
* **Composer**
* **PHPUnit** (para pruebas automatizadas)
* **Git** (control de versiones)

---

# Estructura de Funcionalidades (Casos de Prueba)

El sistema se desarrolló a partir de los siguientes **Casos de Prueba (CP)**:

### CP-001 – Gestión de Colaboradores

Permite registrar y administrar colaboradores.

Funciones implementadas:

* Crear colaboradores
* Listar colaboradores
* Actualizar colaboradores
* Eliminar colaboradores

---

### CP-002 – Gestión de Contratos

Permite registrar contratos asociados a colaboradores existentes.

Validaciones:

* No se puede crear contrato sin colaborador válido
* Validación de fechas
* Validación de salario

---

### CP-003 – Prórroga de Contratos

Permite extender un contrato existente mediante:

* Prórroga por tiempo
* Prórroga por valor

Reglas:

* Solo contratos activos pueden extenderse
* Actualiza la fecha de finalización del contrato

---

### CP-004 – Terminación Anticipada de Contrato

Permite finalizar un contrato antes de su fecha de finalización.

Se registra:

* Fecha de terminación
* Motivo de terminación

Restricción:

* No se puede terminar un contrato que ya esté finalizado.

---

# Requisitos del Sistema

Antes de ejecutar el proyecto se debe tener instalado:

* PHP >= 8.2
* Composer
* MySQL o MariaDB
* Git

Opcional:

* Node.js (no necesario para este proyecto)

---

# Instalación del Proyecto

## 1. Clonar el repositorio

```bash
git clone https://github.com/usuario/nombre-repositorio.git
```

Entrar a la carpeta del proyecto:

```bash
cd nombre-repositorio
```

---

# 2. Instalar dependencias

Ejecutar:

```bash
composer install
```

Esto instalará todas las dependencias de Laravel.

---

# 3. Configurar variables de entorno

Copiar el archivo `.env.example`:

```bash
cp .env.example .env
```

Luego generar la clave de la aplicación:

```bash
php artisan key:generate
```

---

# 4. Configurar base de datos

Editar el archivo `.env` y configurar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rrhh
DB_USERNAME=root
DB_PASSWORD=
```

Crear la base de datos en MySQL o MariaDB.

---

# 5. Ejecutar migraciones

Crear las tablas necesarias:

```bash
php artisan migrate
```

---

# 6. Ejecutar pruebas

Para verificar que el sistema funciona correctamente:

```bash
php artisan test
```

Esto ejecutará todas las pruebas automatizadas del sistema.

---

# Estructura del Proyecto

Las partes principales del sistema se encuentran en:

```
app/
 ├── Models
 ├── Http/Controllers

database/
 └── migrations

routes/
 └── web.php

tests/
 └── Feature
```

---

# Principales Modelos

El sistema utiliza los siguientes modelos:

* **Collaborator**
* **Contract**
* **ContractExtension**
* **ContractTermination**

Relación principal:

```
Collaborator
   └── Contracts
          ├── ContractExtensions
          └── ContractTermination
```

---

# Rutas del Sistema

Principales endpoints implementados:

### Colaboradores

```
GET     /collaborators
POST    /collaborators
PUT     /collaborators/{id}
DELETE  /collaborators/{id}
```

### Contratos

```
POST    /contracts
PUT     /contracts/{id}
```

### Prórrogas de contrato

```
POST    /contract-extensions
```

### Terminación de contrato

```
POST    /collaborators/contracts/{id}/terminate
```

---

# Ejecución del servidor

Para iniciar el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

El sistema estará disponible en:

```
http://127.0.0.1:8000
```

---

# Autor

Proyecto desarrollado como parte de una práctica de **desarrollo backend con Laravel utilizando TDD**.

Autor:
Luis Guerra

---

# Licencia

Este proyecto se desarrolla con fines educativos.

---

# Desarrollador

Luis Guerra

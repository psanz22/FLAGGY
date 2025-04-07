# FLAGGY 🚩 — Proyecto Dockerizado con PHP + PostgreSQL + Nginx + Vite

Este proyecto es un entorno de desarrollo completo para una aplicación web, configurado con Docker. Incluye:

- **PHP 8.2 (FPM)** como backend
- **PostgreSQL** como base de datos
- **Nginx** como servidor web
- **Vite + React** como frontend
- Entorno 100% dockerizado con `docker-compose`

---

## 📁 Estructura del Proyecto

```
.
├── backend/            # Código PHP
│   └── src/            # Archivos fuente del backend
│   └── Dockerfile
├── frontend/           # Proyecto React con Vite
├── docker/
│   └── nginx/
│       └── nginx.conf  # Configuración personalizada de Nginx
├── docker-compose.yml  # Orquestación de servicios
```

---

## 🐳 Cómo levantar el entorno

1. Clona el repositorio:
   ```bash
   git clone https://github.com/psanz22/FLAGGY.git
   cd FLAGGY
   ```

2. Levanta los servicios:
   ```bash
   docker compose up --build
   ```

3. Accede a las aplicaciones:
   - **Frontend (React + Vite):** http://localhost:5173
   - **Backend (PHP vía Nginx):** http://localhost
   - **Base de datos:** PostgreSQL en `localhost:3306` (user: `user`, password: `toor`)

---

## 🧠 Servicios incluidos

| Servicio   | Puerto     | Notas                        |
|------------|------------|------------------------------|
| Nginx      | `80`       | Proxy hacia PHP backend      |
| Frontend   | `5173`     | App React con Vite           |
| PostgreSQL | `3306`     | Persistencia con volumen     |
| Backend    | interno    | Conectado vía FastCGI        |

---

## ⚙️ Variables de entorno de PostgreSQL

```env
POSTGRES_DB=mydatabase
POSTGRES_USER=user
POSTGRES_PASSWORD=toor
```

---

## ✅ Verificación de conexión

Puedes verificar que PHP se conecta correctamente a PostgreSQL mediante un script como este (`index.php` en backend):

```php
<?php
$host = 'postgres';
$dbname = 'mydatabase';
$username = 'user';
$password = 'toor';

$dsn = "pgsql:host=$host;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "Conexión a PostgreSQL exitosa!!!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
```

---

## 🧹 Comandos útiles

- Apagar los contenedores:
  ```bash
  docker compose down
  ```

- Reiniciar limpiamente:
  ```bash
  docker compose down -v --remove-orphans
  docker compose up --build
  ```

---

## 💡 TODOs futuros

- Sustituir backend plano por Symfony u otro framework
- Hacer fetch desde el frontend a una API PHP
- Añadir lógica de rutas o controladores
- Desplegar a producción con Docker + Nginx + Let's Encrypt

---

## ✨ Autor

Creado con ❤️ por [Paula Sanz](https://github.com/psanz22)

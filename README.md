# Ensambler®
Ingeniería de Software para Soluciones Empresariales Integradas.

http://www.ensambler.cl/

2019

--

## Servicios Implementados.

- Wordpress (latest)
- MySQL (latest)
- phpMyAdmin (latest)

## Funcionalidades Implementadas.

- **Git Hooks**:
	- *pre-commit*: Exporta BD del servicio mysql a fichero *"mysql.sql"* antes de cada commit efectuado.
	- *post-merge*: Importa de vuelta BD *"mysql.sql"* al servicio mysql después de cada pull efectuado.
	- *post-checkout*: Importa de vuelta BD *"mysql.sql"* al servicio mysql después de cada checkout efectuado.
	
- **Instalación proyecto de 1 comando vía sh**:
	- **Gestiona** el *git clone* del proyecto.
	- **Incorpora** *Git Hooks* al directorio interno de git.
	- **Activa** permisos de *Git Hooks* como ficheros ejecutables del sistema.
	- **Instala** y levanta automáticamente los *servicios* incorporados.
	- **Importa** automáticamente la BD *"mysql.sql"* al servicio de mysql para primer despliegue.

- **Plantilla README-sample**: Modelo estandarizado para la documentación de proyectos.

- **Importación/exportación manual BD**: Función gitb que permite importar o exportar la base de datos manualmente al contenedor bd del proyecto.

Exportar:

```
gitb export
```

Importar:

```
gitb import
```

--

## 1. Construcción Variables del Proyecto.

- **PASO 1**: En *docker-compose.yml* modificar
	- ___[nombre contenedor]___ únicos para cada servicio.
	- ___[puerto]___ único para servicios de wordpress y mysql. Se recomienda partir desde 8080 y 8000 respectivamente de forma creciente.

- **PASO 2**: Modificar
	- *.git-hooks/pre-commit* con ___[nombre contenedor bd]___ definido en paso 1.
	- *.git-hooks/post-merge* con ___[nombre contenedor bd]___ definido en paso 1.
	- *.git-hooks/post-checkout* con ___[nombre contenedor bd]___ definido en paso 1.
- **PASO 3**: En *install* modificar los valores
	- ___[nombre repositorio]___ con nombre del repositorio creado para el proyecto.
	- ___[nombre contenedor bd]___ con nombre de contenedor db definido en paso 1.
	- ___[puerto wp]___ con número de puerto definido para servicio wordpress en paso 1.
- **PASO 4**: En *README-sample.md* modificar los valores
	- ___[nombre desarrollo]___ con un nombre descriptivo para el Desarrollo.
	- **[desarrollador n]** con nombre de Desarrolladores involucrados en el Proyecto.
	- ___[url install]___ con url (versión raw) del archivo install que se encontrará en el repositorio. Adicionalmente se recomienda acortar la url haciendo uso de https://git.io
	- ___[alias proyecto]___ con un nombre alias único que será utilizado en Terminal para acceder al directorio de trabajo.
- **PASO 5**: Eliminar *README.md* y renombrar ___README-sample.md -> README.md___


## 2. Construcción Sistema de Archivos de Wordpress.


### Primer despliegue.


Terminal:

```bash
docker-compose up
```

---

### Consideraciones finales.
1. La base de datos se exportará y subirá automáticamente al repositorio *(archivo mysql.sql)* al momento de hacer el primer commit y desplegar el proyecto al grupo de trabajo.

2. Se recomienda trabajar **SIEMPRE** bajo la rama *"desarrollo"* hasta obtener una versión estable del producto.
3. Para el despliegue del proyecto al grupo de trabajo: *Seguir instrucciones README.md*

---

### Extra:
Añadir alias **"[un-alias-único]"** al bash_profile para acceder directamente al directorio de trabajo.
*(Reemplazar ".bash_profile" por el archivo bash indicado en caso de ser necesario).*

En Terminal:
```
echo "alias '[un-alias-único]'='cd `pwd`'" >> ~/.bash_profile && source ~/.bash_profile
```
Uso:
```
un-alias-único
```

---

**Programación**: Diego Ulloa Ormeño. ( [@diegoulloao](http://www.github.com/diegoulloao) )

**Licencia**: Libre para distribución, modificación y/o desarrollo.

**2019** - Ensambler®

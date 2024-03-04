<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reportes Generales</title>
    <link rel="stylesheet" href="../users/css/styles.css">
    <link rel="stylesheet" href="../layouts/css/styles.csss">
    <link rel="stylesheet" href="../reportes_generales/css/styles.css">
    <link rel="stylesheet" href="../batch/css/styles.css">
    <link rel="stylesheet" href="../../assets/main.css">
</head>
<body>
    <h1>Reportes</h1><br>

    <h2>Procesos</h2>
<div>

        <div class="other-pagination">

            <div class="amount-list">
                <small>Ordenar por:</small>
                <select name="" id="">
                    <option value="">Fecha_Fin</option>
                    <option value="">Fecha_Inicio</option>
                    <option value="">Estado</option>
                </select>
            </div>
            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                </svg>
                <input type="text" name="" id="" placeholder="Buscar reporte">
            </div>   

        </div>
     
            <table class="customTable">
            <thead>
                <tr>
                    <th>I_P</th>
                    <th>Fecha_Inicio</th>
                    <th>Fecha_Fin</th>
                    <th>Estado</th>
                    <th>Ver_detalle</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>07/09/2024</td>
                    <td>08/10/2020</td>
                    <td>Finalizado</td>
                    <td>....</td>
                    <td><a href="">Editar</a></td>
                    <td><a href="">Borrar</a></td>

                </tr>
            </tbody>
        </table>
    </div><br>    
    <h2>Subprocesos</h2>
    <div>
    <div class="other-pagination">

            <div class="amount-list">
            <small>Ordenar por:</small>
                <select name="" id="">
                    <option value="">Fecha_Fin</option>
                    <option value="">Fecha_Inicio</option>
                    <option value="">Menor a Mayor</option>
                    <option value="">Mayor a Menor</option>
                </select>
            </div>
            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" />
                </svg>
                <input type="text" name="" id="" placeholder="Buscar reporte">
            </div>   

        </div>   

    </div>
        <table class="customTable">
            <thead>
                <th>ID_SUB</th>
                <th>Nombre</th>
                <th>Total_Eventos</th>
                <th>Fecha_Inicio</th>
                <th>Fecha_Fin</th>
                <th>Editar</a></th>
                <th>Borrar</th>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Lucas</td>
                    <td>10</td>
                    <td>10/03/2024</td>
                    <td>10/04/2024</td>
                    <td><a href="">Editar</a></td>
                    <td><a href="">Borrar</a></td>

                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
</body>
</html>
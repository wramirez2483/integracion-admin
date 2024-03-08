<div class="container-batch">

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
                    <th>Id</th>
                    <th>user_id</th>
                    <th>event_id</th>
                    <th>previos_state</th>
                    <th>new_state</th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>02</td>
                    <td>01</td>
                    <td>Inconcluso</td>
                    <td>Finalizado</td>
                    <td>02/09/2023</td>
               </tr>
                <!-- <?php 
                foreach($events as $event) :
                ?>
                    <tr>
                        <td><?php echo $event['Id']; ?></td>
                        <td><?php echo $event['user_id']; ?></td>
                        <td><?php echo $event['event_id']; ?></td>
                        <td><?php echo $event['previos_state']; ?></td>
                        <td><?php echo $event['new_state']; ?></td>
                        <td><?php echo $event['date']; ?></td>
                    </tr>
                    <?php endforeach; ?> -->
            </tbody>
        </table>
        <!-- <div class="pagination">
            <?php if($total_pages > 1) :?>
                <a href="?page=1&amount=<?php echo $records_per_page; ?>">&laquo;</a>
                <?php for($i = 1; $i<= $total_pages; $i++) :?>
                    <a href="?page=<?php echo $i; ?> &amount=<?php echo $records_per_page; ?>"<?php if($i == $current_page) echo 'class="active"';  ?>><?php echo $i; ?></a>
                <?php endfor;?>
                <a href="?page=<?php echo $total_pages; ?>&amount=<?php echo $records_per_page; ?>">&raquo;</a>
            <?php endif; ?>
        </div> -->
    <!-- </div><br>
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
    </table> -->
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
</div>
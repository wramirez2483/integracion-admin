<div class="container-batch">

    <div class="form-batch">
    
        <div class="input">
    
            <label for=""> Integración Disponible </label>
    
            <div class="checkboxes">
    
                <div class="check">
                    
                    <p>Si</p>
                    <input type="checkbox" name="" id="si"  onclick="handleCheckBox('si')">
    
                </div>
    
                <div class="check">
                    <p>No</p>
                    <input type="checkbox" name="" id="no"  onclick="handleCheckBox('no')" >
                </div>
    
            </div>
    

    
        </div>
    
        <div class="input">
    
            <label for=""> Hora de ejecución </label>
            <input type="text" name="" id="" placeholder="En minutos">
    
        </div>
    
        <div class="input">
    
            <label for=""> Destinatario de notificaciónes </label>
            <input type="email" name="" id="" placeholder="@correo">
    
        </div>
    
    </div>
    <hr>
    <div class="events-sync">
        <h1>Eventos por Sincronizar</h1>

        <div class="other-pagination">

            <div class="amount-list">
                <select name="" id="">
                    <option value="">10</option>
                    <option value="">20</option>
                    <option value="">40</option>
                </select>
            </div>
            
            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6"/></svg>
                <input type="text" name="" id="" placeholder="Buscar evento">
            </div>
        </div>

        <table class="customTable">
            <thead>
                <tr>
                <th>Modalidad</th>
                <th>Entrenamiento</th>
                <th>Codigo de Semilla</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>A</td>
                    <td>6</td>
                    <td>INTRODUCCION_ADSO</td>
                </tr>
                <tr>
                    <td>A</td>
                    <td>6</td>
                    <td>INTRODUCCION_ADSO</td>
                </tr> 
                <tr>
                    <td>A</td>
                    <td>6</td>
                    <td>INTRODUCCION_ADSO</td>
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
    
</div>

<script src="../helpers/scripts.js"></script>

<section class=" tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> Consultas Recibidas </h1>
    

<table class="table table-hover mb-0 my-3">
        <thead>
            <tr class="table-primary">
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Motivo</th>
                <th scope="col">Mensaje</th>
                
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($consultas as $row) { ?>
            
                
                    <tr class="table-info">
                        <th scope="row"><?= $row['id_consulta']; ?></th>
                        <td><?= $row['consulta_nombre']; ?></td>
                        <td><?= $row['consulta_apellido']; ?></td>
                        <td>$ <?= $row ['consulta_email'];?></td>
                        <td><?= $row['consulta_motivo']; ?></td>
                        <td><?= $row['consulta_mensaje']; ?></td>
    
                        
                    </tr>
                <?php } ?>
        </tbody>
</table>
</section>

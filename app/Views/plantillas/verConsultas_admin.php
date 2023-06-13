<section class="container-fluid tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> Consultas Recibidas </h1>
    

<table class="table table-hover  table-bordered  mb-0">
        <thead>
            <tr class="table-dark">
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Motivo</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Estado Consulta</th>
                
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($consultas as $row) { ?>
                <?php if ($row['consulta_estado'] == 1) { ?>
                
                    <tr class="table-primary">
                        <th scope="row"><?= $row['id_consulta']; ?></th>
                        <td><?= $row['consulta_nombre']; ?></td>
                        <td><?= $row['consulta_apellido']; ?></td>
                        <td>$ <?= $row ['consulta_email'];?></td>
                        <td><?= $row['consulta_motivo']; ?></td>
                        <td><?= $row['consulta_mensaje']; ?></td>

                        <td class="fw-bold">Consulta ya respondida</td>
                    </tr>
                    <?php } else { ?>
                        <tr class="table-primary">
                        <th scope="row"><?= $row['id_consulta']; ?></th>
                        <td><?= $row['consulta_nombre']; ?></td>
                        <td><?= $row['consulta_apellido']; ?></td>
                        <td>$ <?= $row ['consulta_email'];?></td>
                        <td><?= $row['consulta_motivo']; ?></td>
                        <td><?= $row['consulta_mensaje']; ?></td>
                        <td><a class="btn btn-primary" href="<?php echo base_url ('consulta/'.$row['id_consulta']);  ?>">Marcar como Respondido</a></td>
                    </tr>
                    <?php } ?>

                <?php } ?>
        </tbody>
</table>
</section>

<table id="tblDatosColmena" class="table table-borderless responsive nowrap" style="width: 100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>T. Interior 1</th>
            <th>T. Interior 2</th>
            <th>T. Exterior</th>
            <th>H. Exterior</th>
            <th>H. Interior</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php
                            if ($DATOSCOLMENAID != False) {
                                foreach ($DATOSCOLMENAID as $row) {
                            ?>
        <tr id="tr_<?= $row->id_dato ?>">
            <td>
                <span>
                    <?= $row->id_dato ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->temperaturaIn1 ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->temperaturaIn2 ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->temperaturaEx1 ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->humedadExt ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->humedadInt ?>
                </span>
            </td>
            <td>
                <span>
                    <?= $row->fechaToma ?>
                </span>
            </td>
        </tr>
        <?php }
                            } ?>
    </tbody>
</table>
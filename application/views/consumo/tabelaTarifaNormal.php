<table class="table table-bordered">                                  
    <tbody>
        <tr>
            <th class="align_th" colspan="4"><h4><strong>Tarifa Normal</strong></h4></th>
        </tr>
        <tr>
            <th class="align_th"><strong>Descrição</strong></th>
            <th class="align_th"><strong>Quant. Kwh</strong></th>
            <th class="align_th"><strong>Preço Unit. R$</strong></th>
            <th class="align_th"><strong>Valor R$</strong></th>
        </tr>

                
        <tr>
            <td class="align_td"><?= $calculos["descricao"]["calculoTarifaNormal"] ?></td>
            <td class="align_td"><?= $calculos["calculo"]["valores"]["totalKwh"] ?></td>
            <td class="align_td"><?= $calculos["calculo"]["ultimaTarifaInserida"]["tarifaNormal"] ?></td>
            <td class="align_td"><?= $calculos["calculo"]["valores"]["vlNormal"] ?></td>                                            
        </tr>

        <tr>
            <td class="align_td"><?= $calculos["descricao"]["contribIlumPublica"] ?></td>
            <td class="align_td"></td>
            <td class="align_td"></td>
            <td class="align_td"><?= number_format($calculos["calculo"]["valores"]["taxaIluminacao"], 2) ?></td>                                            
        </tr>

        <tr>
            <td class="align_td"><?= $calculos["descricao"]["total"] ?></td>
            <td class="align_td"></td>
            <td class="align_td"></td>
            <td class="align_td"><?= number_format($calculos["calculo"]["contas"]["totalNormal"], 2) ?></td>                                            
        </tr>
        
    </tbody>
</table>
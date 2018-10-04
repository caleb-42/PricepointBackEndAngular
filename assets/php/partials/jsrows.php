<tr ng-if= "<?php echo $_GET['jsrow'] == 'prod' ?>" ng-repeat = "row in rowlist" class = "wht f-13"
 ng-class = "{trow:row.id == tabpane.activerow}" ng-click = "tabpane.selectRow(row.id)" >

    <td style="text-align: center; display:none;" class="tdel pkey id">{{row.id}}</td>
    <td style="text-align: center;" class="tdel expydate">{{row.expirydate}}</td>
    <td style="text-align: center;" class="tdel stockbought">{{row.stockbought}}</td>
    <td style="text-align: center;" class="tdel stocksold">{{row.stocksold}}</td>
    <td style="text-align: center;" class="tdel stockremain">{{row.stockremain}}</td>
    <td style="text-align: center;" class="tdel stockentrydate">{{row.entry_date}}</td>
    
</tr>
<!-- <tr ng-repeat = "row in rowlist" class = "wht f-13"  ng-class = "{trow:row.id == tabpane.activerow}" ng-click = "tabpane.selectRow(row.id)" ><td style="text-align: center; display:none;" class="tdel pkey id">{{row.id}}</td><td style="text-align: center;" class="tdel expydate">{{row.expirydate}}</td><td style="text-align: center;" class="tdel stockbought">{{row.stockbought}}</td><td style="text-align: center;" class="tdel stocksold">{{row.stocksold}}</td><td style="text-align: center;" class="tdel stockremain">{{row.stockremain}}</td><td style="text-align: center;" class="tdel stockentrydate">{{row.entry_date}}</td></tr> -->
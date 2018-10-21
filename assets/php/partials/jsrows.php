<div ng-if= "<?php echo $_GET['jsrow'] == 'prod' ?>" >
            <tr ng-if = "type == 'stock'" ng-repeat = "row in rowlist" class = "wht f-13"
            ng-class = "{trow:row.id == tabpane.activerow}" ng-click = "mkactive($event)" >

                <td name = "id" style="text-align: center; display:none;" class="tdel pkey id">{{row.id}}</td>
                <td name = "expirydate" style="text-align: center;" class="tdel expydate">{{row.expirydate}}</td>
                <td name = "stockbought" style="text-align: center;" class="tdel stockbought">{{row.stockbought}}</td>
                <td name = "stocksold" style="text-align: center;" class="tdel stocksold">{{row.stocksold}}</td>
                <td name = "stockremain" style="text-align: center;" class="tdel stockremain">{{row.stockremain}}</td>
                <td name = "entry_date" style="text-align: center;" class="tdel stockentrydate">{{row.entry_date}}</td>
                
            </tr>
            <tr ng-if = "type == 'stockentry'" ng-repeat = "row in rowlist" class = "wht f-13"
            ng-class = "{trow:row.id == tabpane.activerow}" ng-click = "tabpane.selectRow(row.id)" >
            
                <td style="text-align: center; display:none;" class="tdel pkey id">{{row.id}}</td>
                <td style="text-align: center;" class="tdel entrydate">{{row.entry_date}}</td>
                <td style="text-align: center;" class="tdel stockno">{{row.stockno}}</td>
                <td style="text-align: center;" class="tdel byadmin">{{row.byadmin}}</td>
                
            </tr>
</div>

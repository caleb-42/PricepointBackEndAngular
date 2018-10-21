<div id="prod" class="tab" ng-controller = "products">
    <div class="tabdock float-left">
        <div id="product-list" class="mb-5">
            <div class = "mang anim">
                <h4>Manage Products</h4>
                <input class="search" placeholder="Search" id = "productsearch"  ng-focus = "settings.emitter('recreatejslist',{}); history.activepane = 'none'"/>
                <div class="row justify-content-between py-3 crudhd">
                    <button class="btn btn-success btn-md btn-pill"  data-toggle = "modal" data-target = "#crud" ng-click = "settings.modal.active = 'Product'; settings.modal.name = 'Add Product'; settings.modal.size = 'md' ">Add Product</button>
                    <button class="btn btn-warning btn-md btn-pill" ng-click = "">Delete Product</button>
                    <button class="btn btn-primary btn-md btn-pill"  data-toggle = "modal" data-target = "#crud" ng-click = "settings.modal.active = 'Product'; settings.modal.name = 'Update Product'; settings.modal.size = 'lg' ">Update Product</button>
                </div>
                <div class="row mt-3 w-100 p-2" style="margin:0; background:#2499BC; color:#fff;">
                    <div ng-repeat = "hd in products.prodlisthd" style = "{{hd.style}}" class="{{hd.class}}" data-sort="{{hd.datasort}}">
                        {{hd.name}}
                    </div>
                </div>
            </div>
            <jslist listid = "product-list" listrow = '.rowcont div' selectevt = "selectProduct" getlistfunc = "products.getprodlist()"></jslist>
        </div>
    </div>
    <div class="history float-right">
        <div id="producthistorypane" class="tabdockpane">
            <div class="stocknodisp text-center disp {{history.activepane == 'none' ? 'notgone' : 'gone'}}">
                <h3>Select a Product</h3>
            </div>
            <div>
            <h3 ng-click = "history.activepane = 'stocks'" class ="prodname hs-10 tabpaneTitle  {{history.activepane != 'none' ? 'notgone' : 'gone'}}">{{history.selectedProd}}</h3>
            <div class="stockdisp disp {{history.activepane == 'stocks' ? 'notgone' : 'gone'}}">
                <div class="tab1 table-responsive" style="overflow-x: hidden;">
                    <table class="table table-striped table-bordered table-sm" width="100%" id="stocktable">
                        <div class="histmang">
                            <col width="30%">
                            <col width="15%">
                            <col width="15%">
                            <col width="20%">
                            <col width="30%">
                            <div class="crudhd row my-3 d-flex flex-column">
                                <input class="form-control w-100 mb-2 text-center" onkeyup="tablefilter($(this), 'stocktable');" placeholder="Search" id = "stocksearch"/>
                                <button class="btn btn-secondary btn-sm btn-pill mb-1"  data-toggle = "modal" data-target = "#addStock" onclick="modaltitlechg('#addStock .modal-title','li.actparent .product_name')">Add Stock</button>
                                <button class="btn btn-secondary btn-sm btn-pill mb-4" onclick="deleteStock();">Delete Stock</button>
                            </div>
                            <thead class="" >
                                <tr>
                                    <th style="text-align: center;">EXP DATE</th>
                                    <th style="text-align: center;">STK BOUGHT</th>
                                    <th style="text-align: center;">STK SOLD</th>
                                    <th style="text-align: center;">STK LEFT</th>
                                    <th style="text-align: center;">ENTRY DATE</th>
                                </tr>
                            </thead>
                        </div>
                        <tbody jsrow type = "history.stock.type" selectedevt = "selectProduct" selectevt = "selectStock" getrowfunc = "history.stock.getstocklist(obj)" id="prodlist" class="tabtable">
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="stockdisp disp {{history.activepane == 'stockentry' ? 'notgone' : 'gone'}}">
                <div class="tab2 table-responsive" style="overflow-x: hidden;">
                    <table class="table table-striped table-bordered table-sm" width="100%" id="stockentrytable">
                        <div class="histmang">
                            <col width="40%">
                            <col width="20%">
                            <col width="40%">
                            <h3 class ="prodname tabpaneTitle" onclick="togglehisttab('stockdisp')"></h3>
                            <div class="paneinfo">
                                <div class = "row justify-content-between mb-1"><span>Expiry Date</span> <span class="expdt">{{history.selectedStock.expirydate}}</span></div>
                                <div class = "row justify-content-between mb-1"><span>Bought Stock</span> <span class="totstk ">{{history.selectedStock.stockbought}}</span></div>
                                <div class = "row justify-content-between mb-1"><span>Sold Stock</span> <span class="sldstk ">{{history.selectedStock.stocksold}}</span></div>
                                <div class = "row justify-content-between mb-1"><span>Left Stock</span> <span class="lftstk ">{{history.selectedStock.stockremain}}</span></div>
                            </div>

                            <div class="row my-3 d-flex flex-column crudhd">
                                <input class="form-control w-100 mb-2 text-center" onkeyup="tablefilter($(this), 'stockentrytable');" placeholder="Search" id = "stockentrysearch"/>

                                <button class="btn btn-secondary btn-sm btn-pill mb-1 deactivate"  data-toggle = "modal" data-target = "#updateStock" onclick="updateStock('load');">Update Stock Entry</button>
                                <button class="btn del btn-secondary btn-sm btn-pill  mb-4 deactivate" onclick="deleteStockentry();">Delete Stock Entry</button>
                            </div>
                            <thead class="">
                                <tr>
                                    <th style="text-align: center;">ENTRY DATE</th>
                                    <th style="text-align: center;">STK QTY</th>
                                    <th style="text-align: center;">BY ADMIN</th>
                                </tr>
                            </thead>
                        </div>
                        <tbody jsrow type = "history.stockentry.type" selectedevt = "selectStock" selectevt = "selectStockEntry" getrowfunc = "history.stockentry.getstockentrylist(obj)"  id="prodlistdetails" class="tabtable stktb">

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="crud" role="dialog" modalentry></div>
</div>
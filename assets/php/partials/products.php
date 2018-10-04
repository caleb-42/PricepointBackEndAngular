<div id="prod" class="tab" ng-controller = "products">
                        <div class="tabdock float-left">
                            <div id="product-list" class="mb-5">
                                <div class = "mang anim">
                                    <h4>Manage Products</h4>
                                    <input class="search" placeholder="Search" id = "productsearch"  ng-focus = "jslist.createList(); history.activepane = 'none'"/>
                                    <div class="row justify-content-between py-3 crudhd">
                                        <button class="btn btn-success btn-md btn-pill"  data-toggle = "modal" data-target = "#addProduct">Add Product</button>
                                        <button class="btn btn-warning btn-md btn-pill" onclick="deleteProduct();">Delete Product</button>
                                        <button class="btn btn-primary btn-md btn-pill deactivate updateprodbtn"  data-toggle = "modal" data-target = "#updateProduct" onclick="updateProduct('load');">Update Product</button>
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
                                <div class="stockdisp disp {{history.activepane == 'stocks' ? 'notgone' : 'gone'}}">
                                    <div class="tab1 table-responsive" style="overflow-x: hidden;">
                                        <table class="table table-striped table-bordered table-sm" width="100%" id="stocktable">
                                            <div class="histmang">
                                                <col width="30%">
                                                <col width="15%">
                                                <col width="15%">
                                                <col width="20%">
                                                <col width="30%">
                                                <h3 class ="prodname hs-10 tabpaneTitle" onclick="togglehisttab('stockdisp')">{{history.selectedProd}}</h3>
                                                <div class="crudhd row my-3 d-flex flex-column">
                                                    <input class="form-control w-100 mb-2 text-center" onkeyup="tablefilter($(this), 'stocktable');" placeholder="Search" id = "stocksearch"/>
                                                    <button class="btn btn-secondary btn-sm btn-pill mb-1"  data-toggle = "modal" data-target = "#addStock" onclick="modaltitlechg('#addStock .modal-title','li.actparent .product_name')">Add Stock</button>
                                                    <button class="btn btn-secondary btn-sm btn-pill mb-1" onclick="deleteStock();">Delete Stock</button>
                                                </div>
                                                <thead class="mt-5">
                                                    <tr>
                                                        <th style="text-align: center;">EXP DATE</th>
                                                        <th style="text-align: center;">STK BOUGHT</th>
                                                        <th style="text-align: center;">STK SOLD</th>
                                                        <th style="text-align: center;">STK LEFT</th>
                                                        <th style="text-align: center;">ENTRY DATE</th>
                                                    </tr>
                                                </thead>
                                            </div>
                                            <tbody jsrow selectevt = "selectProduct" getrowfunc = "history.stock.getstocklist(obj)" id="prodlist" class="tabtable">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
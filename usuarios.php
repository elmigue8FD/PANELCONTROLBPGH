<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html lang="en"> <!--<![endif]-->


    <head>    
        <?php include("./codigo_general/head.php"); ?>
    </head>


    <body class=" sidebar_main_open sidebar_main_swipe">
        <!--Titlo de la seccion de la pagina-->
        <h1 id="tituloDeLaPagina" hidden>Usuarios</h1>
        <!-- main header -->
        <header id="header_main">
            
            <?php include('./codigo_general/header_main.php'); ?>
            
        </header><!-- main header end -->
        <!-- main sidebar -->
        <aside id="sidebar_main">
            
            <!-- sidebar_main_header -->
            <?php include('./codigo_general/sidebar_main_header.php'); ?>
            <!-- sidebar_main_header end -->
            
            <div class="menu_section">
                <?php include('./codigo_general/menu_section.php'); ?>            
            </div>
        </aside><!-- main sidebar end -->

        <div id="page_content">
            <div id="page_content_inner">
                <!--<h3 class="heading_b uk-margin-bottom">Usuarios</h3>-->
                <!--<div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-vertical-align">
                                    <div class="uk-vertical-align-middle">
                                        <ul id="contact_list_filter" class="uk-subnav uk-subnav-pill uk-margin-remove">
                                            <li class="uk-active" data-uk-filter=""><a href="#">All</a></li>
                                            <li data-uk-filter="goodwin-nienow"><a href="#">Goodwin-Nienow</a></li>
                                            <li data-uk-filter="strosin groupa"><a href="#">Strosin Groupa</a></li>
                                            <li data-uk-filter="schamberger plc"><a href="#">Schamberger PLC </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label for="contact_list_search">Search... (min 3 char.)</label>
                                <input class="md-input" type="text" id="contact_list_search"/>
                            </div>
                        </div>
                    </div>
                </div>-->
                <h3 class="heading_b uk-text-center grid_no_results" style="display:none">No results found</h3>
                <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
                    <div>
                        <div class="md-card">
                            <div class="md-card-head md-bg-light-blue-600" data-uk-modal="{target:'#modal_modificar_usuario'}">
                                <!--
                                <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#">User profile</a></li>
                                            <li><a href="#">User permissions</a></li>
                                            <li><a href="#" class="uk-text-danger">Delete user</a></li>
                                        </ul>
                                    </div>
                                </div>
                                -->
                                <div class="uk-text-center">
                                    <img class="md-card-head-avatar" src="assets/img/avatars/avatar_11.png" alt=""/>
                                </div>
                                <h3 class="md-card-head-text uk-text-center md-color-white">
                                    Mariah Hartmann                                <span>ashlynn.jenkins@keeling.com</span>
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <ul class="md-list md-list-addon">
                                    <li data-uk-modal="{target:'#modal_modificar_usuario'}">
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">xyost@yahoo.com</span>
                                            <span class="uk-text-small uk-text-muted">Email</span>
                                        </div>
                                    </li>
                                    <li data-uk-modal="{target:'#modal_modificar_usuario'}">
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">774.330.8804x99429</span>
                                            <span class="uk-text-small uk-text-muted">Phone</span>
                                        </div>
                                    </li>
                                    <li data-uk-modal="{target:'#modal_modificar_usuario'}">
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">facebook.com/envato</span>
                                            <span class="uk-text-small uk-text-muted">Facebook</span>
                                        </div>
                                    </li>
                                    <li data-uk-modal="{target:'#modal_modificar_usuario'}">
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon uk-icon-twitter"></i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">twitter.com/envato</span>
                                            <span class="uk-text-small uk-text-muted">Twitter</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-content">
                                            <div class="uk-width-medium-1-1">
                                            <button type="button" class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light" onclick="UIkit.modal.confirm('Estás seguro de eliminar este usuario?', function(){ UIkit.modal.alert('Eliminado con éxito!'); });">Eliminar</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div data-uk-filter="goodwin-nienow,conner wintheiser phd,mya.raynor@reilly.com">
                    </div>

                </div>

                
                    
                        <!--
                        <button class="" data-uk-modal="{target:'#modal_modificar_usuario'}">
                        </button>
                        -->
                        <div class="md-card-head-avatar md-fab" data-uk-modal="{target:'#modal_alta_usuario'}">
                            <i class="material-icons">&#xE145;</i>
                        </div>
                            
                        <div class="uk-width-medium-1-3">
                            <div class="uk-modal" id="modal_alta_usuario" >
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Nuevo usuario <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <input type="checkbox" data-switchery checked id="switch_demo_1" />
                                            <label for="switch_demo_1" class="inline-label">Activado</label>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row">
                                                <!--<div class="uk-grid" data-uk-grid-margin>-->
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Nombre(s)</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Apellidos</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Email</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Celular</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                                <!--</div>-->
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Password</label>
                                                    <input type="password" class="md-input" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                                    <option value="" disabled selected hidden>* Nivel de acceso</option>
                                                    <option value="a">Dueño</option>
                                                    <option value="b">Gerente</option>
                                                    <option value="c">Empleado</option>
                                                </select>
                                            </div>             
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-modal" id="modal_new">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <p class="uk-text-bold">Registro Exitoso.</p>
                                </div>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3">
                            <div class="uk-modal" id="modal_modificar_usuario" >
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Usuario <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <input type="checkbox" data-switchery checked id="switch_demo_1" />
                                            <label for="switch_demo_1" class="inline-label">Activado</label>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row">
                                                <!--<div class="uk-grid" data-uk-grid-margin>-->
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Nombre(s)</label>
                                                    <input type="text" class="md-input" value="Marisol" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Apellidos</label>
                                                    <input type="text" class="md-input" value="Torres" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Email</label>
                                                    <input type="text" class="md-input" value="ethelyn61@yahoo.com" />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Celular</label>
                                                    <input type="text" class="md-input" value="44-48-90-78-65"/>
                                                </div>
                                                <!--</div>-->
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-width-medium-1-1">
                                                    <label>* Password</label>
                                                    <input type="password" class="md-input"  value="marisolTorres98." />
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                                    <option value="" disabled selected hidden>* Nivel de acceso</option>
                                                    <option value="a" selected>Dueño</option>
                                                    <option value="b">Gerente</option>
                                                    <option value="c">Empleado</option>
                                                </select>
                                            </div>             
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-modal" id="modal_new">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <p class="uk-text-bold">Actualización Exitosa.</p>
                                </div>
                            </div>
                        </div>

                    </div>                        
                </div>
            </div>
        </div>


        <!-- secondary sidebar -->
       
        <!-- secondary sidebar end -->

        <!-- CODIGO EN GENERAL -->
       <?php include('./codigo_general/script_common.php'); ?>
       

        <!-- page specific plugins           -->
        <script src="assets/js/pages/page_contact_list.min.js"></script>

       
        <!-- DONDE SE AGREGARAN LOS SCRIPTS  -->
        <!-- /////////////////////////////// -->
        <!-- /////////////////////////////// -->
        <!-- /////////////////////////////// -->
    </body>
</html>
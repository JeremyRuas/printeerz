<html lang="en" data-reactroot="">
<?php //session_start();

//$user_image = session('imageName');
?>
<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta charSet="utf-8" />
    <title>Printeerz Dashboard</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/js/bundle.js"></script>
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
</head>
<body>
    <link async="" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet" />
    <div id="root">
        <div class="uik-PageFade__animationWrapper uik-App__app" style="position:relative">
            <div class="uik-container-h__wrapper">
                <div class="uik-nav-panel__wrapper">
                    <div class="uik-container-v__container">
                        <div class="uik-top-bar__wrapper uik-top-bar__center">
                            <div  class="uik-top-bar-section__wrapper" href="{{route('home')}}"><i class="uikon">home</i></div>
                        </div>
                        <div class="uik-scroll__wrapper">
                            <div class="uik-nav-user__wrapper">
     
@if(Auth::check())                         <!-- ~~~~~~~~________ PHOTO DE PROFIL DU USER ________~~~~~~~~ -->
@if( Auth::user()->imageName)
                                <div class="uik-nav-user__avatarWrapper"><img alt="bob" class="uik-nav-user__avatar" src="/uploads/{{ Auth::user()->imageName }}" /></div><span class="uik-nav-user__name">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span><span class="uik-nav-user__textTop">{{ Auth::user()->role }}</span></div>
@else     
                                <div class="uik-nav-user__avatarWrapper"><img alt="bob" class="uik-nav-user__avatar" src="/uploads/no_image.jpg" /></div><span class="uik-nav-user__name">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                          

                                <span class="uik-nav-user__textTop">{{ Auth::user()->role }}</span></div>
@endif
@else
    <?php return redirect('errors/404');?>
           
@endif   
                            <div class="uik-divider__horizontal"></div>

                            <!-- ~~~~~~~~________ NAV DE GAUCHE ________~~~~~~~~ -->

                            <div class="uik-nav-link-two-container__wrapper">
                            <a class="uik-nav-link-2__wrapper active uik-nav-link-2__highlighted">
                                <span class="uik-nav-link-2__text">
                                    <span class="uik-nav-link-2__icon"><i class="uikon">gallery_grid_view</i></span>Dashboard</span>
                            </a>
                            <a class="uik-nav-link-2__wrapper uik-nav-link-2__highlighted" href="{{route('user_index')}}">
                                <span class="uik-nav-link-2__text">
                                <span class="uik-nav-link-2__icon" ><i class="uikon">calendar</i></span>Utilisateurs</span>
                                </a>
                            <a class="uik-nav-link-2__wrapper uik-nav-link-2__highlighted" href="{{route('index_event')}}">
                                <span class="uik-nav-link-2__text"><span class="uik-nav-link-2__icon"><i class="uikon">inbox_paper_round</i>
                                </span>Evénements</span></a>
                                <a class="uik-nav-link-2__wrapper uik-nav-link-2__highlighted" href="{{route('index_customer')}}"><span class="uik-nav-link-2__text"><span class="uik-nav-link-2__icon"><i class="uikon">money_round</i></span>Clients</span></a>
                                <a class="uik-nav-link-2__wrapper uik-nav-link-2__highlighted"  href="{{route('index_product')}}"><span class="uik-nav-link-2__text"><span class="uik-nav-link-2__icon"><i class="uikon">container</i></span>Produits</span></a>
                                <a class="uik-nav-link-2__wrapper uik-nav-link-2__highlighted"  href="{{route('index_product')}}"><span class="uik-nav-link-2__text"><span class="uik-nav-link-2__icon"><i class="uikon">container</i></span>Gabarits</span></a>

                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="uik-nav-link-2__wrapper active uik-nav-link-2__highlighted" ><span class="uik-nav-link-2__text "><span class="uik-nav-link-2__icon"><i class="uikon">gallery_grid_view</i></span>Déconnexion</span></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></div>
                            <!-- <section class="uik-nav-section__wrapper"><span class="uik-nav-section-title__wrapper">Recently viewed</span><a class="uik-nav-link__wrapper"><span class="uik-nav-link__text">Overall Performance</span><span class="uik-nav-link__rightEl">→</span></a><a class="uik-nav-link__wrapper"><span class="uik-nav-link__text">Invoice #845</span><span class="uik-nav-link__rightEl">→</span></a><a class="uik-nav-link__wrapper"><span class="uik-nav-link__text">Customer: Minerva Viewer</span><span class="uik-nav-link__rightEl">→</span></a></section> -->
                        </div>
                    </div>
                </div>
                
                <div class="uik-container-v__container">
                    <div class="uik-top-bar__wrapper">
                        <div class="uik-top-bar-section__wrapper">
                        @if($_SERVER['REQUEST_URI'] == '/admin/Product/index')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Gestion des produits</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Event/index')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Gestion des événements</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Customer/index')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Gestion des clients</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/User/index')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Gestion des utilisateurs</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/User/add')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Ajout d'un utilisateur</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/User/edit')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Modification d'un utilisateur</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Product/add')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Ajout d'un produit</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Product/edit')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Modification d'un produit</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Event/show')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Page événement</h2></div>
                        
                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Event/add')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Ajout d'un événement</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Event/edit')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Modification d'un événement</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Customer/show')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Page client</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Customer/add')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Ajout d'un client</h2></div>

                        @elseif($_SERVER['REQUEST_URI'] == '/admin/Customer/edit')
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Modification d'un client</h2></div>
                        
                        @else
                            <h2 class="uik-top-bar-title__wrapper uik-top-bar-title__large">Détails</h2></div>

                        @endif
                        <div class="uik-top-bar-section__wrapper">
                            <div class="uik-select__wrapper">

                                <!-- ~~~~~~~~________ BOUTON CHOIX DE LANGUE ________~~~~~~~~ -->
                                <!--<button class="uik-btn__base uik-select__valueRendered" type="button">
                                    <div class="uik-btn__content">
                                        <div class="uik-select__valueRenderedWrapper">
                                            <div class="uik-select__valueWrapper"><span><img alt="english" class="uik-analytics-header__selectFlag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAKCAYAAACE2W/HAAAAAXNSR0IArs4c6QAAAfFJREFUKBVVkD9oE3EUgL/fXf41TWhS1MZa29pGBxEqrTqIo6BGW0Fs6CAO6qA4VKzo0hTUOii4SMHNoSjBgtDBRqNiEB0silbwD1WTiKZgorU5TWIuyd15OVz64D14j+/jPZ74cnZ0puPccCg6qzA++Y7k1zzKk8OkVvjQFIVN5TIrB6ZpbrRxaneAQ9IHqoG2mDRu3xGKHY+wz53h6cUeTh5cT0WtooKVmimGt3hIDK+hP/OAdN9Oxj76Q6Lv2D0jGFzF+dY0AZdG02AYw5Te+P1o+Ty9qoqYf4syn+RP/yBj117w/vMiovT4keGSdEqahG4augnWIxUOoxeLdE1NIft8CFlGVFTcLhuSLBCzYGgWurw4/reV5WOrk8wqFk8cNWo6lNUaht3EdR29VOJXNIpwOGgeGrJg4XRSF+rX6c4GxEDkmbGhw8/IkY14HsbxdHdidAZ5ZbNZJ25eWrLEQvw+OVXmaq6ddOoHUgMau7pt1C5foSgcjN78hF4oWDCGQaFU5dKN12it7fjtGtvuTuAqKYjUdNwI/M5wR2nh+ssKye9/Wbi9lznzIXJTE+syOdr23GJrz2rOHOgitLbG3MQktpaFVCzq7g1dSGTJ/SxjlyVkr5dGc6csBF6Pg0JZIvE8y7dsherp7eyPjMz8AyZFwToTjm94AAAAAElFTkSuQmCC"/>ENG</span></div>
                                            <div class="uik-select__arrowWrapper"></div>
                                        </div>
                                    </div>
                                </button>-->
                            </div>
                        </div>
                    </div>                                       
                    @yield('content')
                    <!--<div class="uik-layout-main__wrapper">
                        <div class="uik-layout-main__wrapperInner">
                            <div class="uik-widget__wrapper uik-widget__margin">
                                <div class="uik-widget-title__wrapper">                                
                                    <h3>Daily Visitors</h3>
                                    <div class="uik-analytics-home__headerActions">
                                        <div class="uik-select__wrapper">
                                            <button class="uik-btn__base uik-select__valueRendered" type="button">
                                                <div class="uik-btn__content">
                                                    <div class="uik-select__valueRenderedWrapper">
                                                        <div class="uik-select__valueWrapper">December</div>
                                                        <div class="uik-select__arrowWrapper"></div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="uik-select__wrapper">
                                            <button class="uik-btn__base uik-select__valueRendered" type="button">
                                                <div class="uik-btn__content">
                                                    <div class="uik-select__valueRenderedWrapper">
                                                        <div class="uik-select__valueWrapper">2018</div>
                                                        <div class="uik-select__arrowWrapper"></div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="uik-widget-content__wrapper">
                                    <div class="uik-chartjs__wrapper">
                                        <div class="uik-chartjs__canvasWrapper">
                                            <div class="uik-chartjs__tooltipWrapper">
                                                <canvas id="chart"></canvas>
                                                <div class="uik-chartjs__tooltip">
                                                    <div class="tooltip__content">
                                                        <table></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uik-analytics-home__miniChartContainer">
                                <div class="uik-widget__wrapper uik-widget-chart-summary__wrapper uik-analytics-home__miniChart uik-widget__padding uik-widget__margin"><span class="uik-widget-chart-summary__label">Realtime users</span><span class="uik-widget-chart-summary__value">848</span><span class="uik-widget-chart-summary__diff">+10.00%<i class="uikon uik-widget-chart-summary__icon">trending_up</i></span>
                                    <div class="uik-chartjs__wrapper uik-widget-chart-summary__chart">
                                        <div class="uik-chartjs__canvasWrapper">
                                            <div class="uik-chartjs__tooltipWrapper">
                                                <canvas id="chart"></canvas>
                                                <div class="uik-chartjs__tooltip">
                                                    <div class="tooltip__content">
                                                        <table></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uik-widget__wrapper uik-widget-chart-summary__wrapper uik-analytics-home__miniChart uik-widget__padding uik-widget__margin"><span class="uik-widget-chart-summary__label">Total Visits</span><span class="uik-widget-chart-summary__value">54,598</span><span class="uik-widget-chart-summary__diff uik-widget-chart-summary__down">-11.81%<i class="uikon uik-widget-chart-summary__icon">trending_down</i></span>
                                    <div class="uik-chartjs__wrapper uik-widget-chart-summary__chart">
                                        <div class="uik-chartjs__canvasWrapper">
                                            <div class="uik-chartjs__tooltipWrapper">
                                                <canvas id="chart"></canvas>
                                                <div class="uik-chartjs__tooltip">
                                                    <div class="tooltip__content">
                                                        <table></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uik-widget__wrapper uik-widget-chart-summary__wrapper uik-analytics-home__miniChart uik-widget__padding uik-widget__margin"><span class="uik-widget-chart-summary__label">Bounce Rate</span><span class="uik-widget-chart-summary__value">73.67</span><span class="uik-widget-chart-summary__diff">+12.20%<i class="uikon uik-widget-chart-summary__icon">trending_up</i></span>
                                    <div class="uik-chartjs__wrapper uik-widget-chart-summary__chart">
                                        <div class="uik-chartjs__canvasWrapper">
                                            <div class="uik-chartjs__tooltipWrapper">
                                                <canvas id="chart"></canvas>
                                                <div class="uik-chartjs__tooltip">
                                                    <div class="tooltip__content">
                                                        <table></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uik-widget__wrapper uik-widget-chart-summary__wrapper uik-analytics-home__miniChart uik-widget__padding uik-widget__margin"><span class="uik-widget-chart-summary__label">Visit Duration</span><span class="uik-widget-chart-summary__value">1m 4s</span><span class="uik-widget-chart-summary__diff">+19.68%<i class="uikon uik-widget-chart-summary__icon">trending_up</i></span>
                                    <div class="uik-chartjs__wrapper uik-widget-chart-summary__chart">
                                        <div class="uik-chartjs__canvasWrapper">
                                            <div class="uik-chartjs__tooltipWrapper">
                                                <canvas id="chart"></canvas>
                                                <div class="uik-chartjs__tooltip">
                                                    <div class="tooltip__content">
                                                        <table></table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uik-analytics-home__tables">
                                <div class="uik-widget__wrapper uik-analytics-home__widgetMostVisited uik-widget__margin">
                                    <div class="uik-widget-title__wrapper">
                                        <h3>Most Visited Pages</h3></div>
                                    <table class="uik-widget-table__wrapper">
                                        <thead>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Visitors</th>
                                                <th>Unique Page Visits</th>
                                                <th>Bounce Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentPageName">/store/<i class="uikon uik-analytics-most-visited__iconTrend">trending_up</i></div>
                                                </td>
                                                <td>4,890</td>
                                                <td>3,985</td>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentBounceRate">85,17%
                                                        <div class="uik-chartjs__wrapper uik-analytics-most-visited__minichart">
                                                            <div class="uik-chartjs__canvasWrapper">
                                                                <div class="uik-chartjs__tooltipWrapper">
                                                                    <canvas id="chart"></canvas>
                                                                    <div class="uik-chartjs__tooltip">
                                                                        <div class="tooltip__content">
                                                                            <table></table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentPageName">/store/symbol-styleguides<i class="uikon uik-analytics-most-visited__iconTrend">trending_up</i></div>
                                                </td>
                                                <td>1,824</td>
                                                <td>2,391</td>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentBounceRate">38,37%
                                                        <div class="uik-chartjs__wrapper uik-analytics-most-visited__minichart">
                                                            <div class="uik-chartjs__canvasWrapper">
                                                                <div class="uik-chartjs__tooltipWrapper">
                                                                    <canvas id="chart"></canvas>
                                                                    <div class="uik-chartjs__tooltip">
                                                                        <div class="tooltip__content">
                                                                            <table></table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentPageName">/store/dashboard-ui-kit<i class="uikon uik-analytics-most-visited__iconTrend">trending_up</i></div>
                                                </td>
                                                <td>8,123</td>
                                                <td>5,293</td>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentBounceRate">67,13%
                                                        <div class="uik-chartjs__wrapper uik-analytics-most-visited__minichart">
                                                            <div class="uik-chartjs__canvasWrapper">
                                                                <div class="uik-chartjs__tooltipWrapper">
                                                                    <canvas id="chart"></canvas>
                                                                    <div class="uik-chartjs__tooltip">
                                                                        <div class="tooltip__content">
                                                                            <table></table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentPageName">/store/webflow-cards.html<i class="uikon uik-analytics-most-visited__iconTrend">trending_up</i></div>
                                                </td>
                                                <td>2,440</td>
                                                <td>1,789</td>
                                                <td>
                                                    <div class="uik-analytics-most-visited__contentBounceRate">39,59%
                                                        <div class="uik-chartjs__wrapper uik-analytics-most-visited__minichart">
                                                            <div class="uik-chartjs__canvasWrapper">
                                                                <div class="uik-chartjs__tooltipWrapper">
                                                                    <canvas id="chart"></canvas>
                                                                    <div class="uik-chartjs__tooltip">
                                                                        <div class="tooltip__content">
                                                                            <table></table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="uik-widget__wrapper uik-widget__margin">
                                    <div class="uik-widget-title__wrapper">
                                        <h3>Social Media Traffic</h3></div>
                                    <table class="uik-widget-table__wrapper uik-analytics-social-media__table">
                                        <thead>
                                            <tr>
                                                <th>Network</th>
                                                <th>Visitors</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Instagram</td>
                                                <td>
                                                    <div class="uik-analytics-social-media__contentVisitors">4,890
                                                        <div class="uik-progress-bar__wrapper uik-analytics-social-media__progressBar">
                                                            <div class="uik-progress-bar__progressLine" style="width:70%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Facebook</td>
                                                <td>
                                                    <div class="uik-analytics-social-media__contentVisitors">1,824
                                                        <div class="uik-progress-bar__wrapper uik-analytics-social-media__progressBar">
                                                            <div class="uik-progress-bar__progressLine" style="width:13%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Twitter</td>
                                                <td>
                                                    <div class="uik-analytics-social-media__contentVisitors">8,123
                                                        <div class="uik-progress-bar__wrapper uik-analytics-social-media__progressBar">
                                                            <div class="uik-progress-bar__progressLine" style="width:37%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>LinkedIn</td>
                                                <td>
                                                    <div class="uik-analytics-social-media__contentVisitors">63
                                                        <div class="uik-progress-bar__wrapper uik-analytics-social-media__progressBar">
                                                            <div class="uik-progress-bar__progressLine" style="width:57%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready(function() {
    $('.datatable').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
      }
    });
} );</script>
</body>

</html>
<ul class="breadcrumb">
    <li>
        <a href="{{URL::to('/dojo')}}">Home</a>
        <span class="divider">/</span>
    </li>
    <li>
        <a href="{{URL::to('/dojo/articles')}}" class="active">Articles</a>
        <span class="divider">/</span>
    </li>
</ul>

<div id="content" class="flex">

    <h1>Select article to change</h1>

    <ul class="object-tools pull-right">

        <li>
            <a href="/admin/articles/add/" class="addlink btn btn-primary">Add Article</a>
        </li>

    </ul>
    <script type="text/javascript">django.jQuery("ul.object-tools li a").addClass("btn");</script>
</div>
<div id="content-main">

    <div class="module filtered" id="changelist">
        <div class="navbar subnav">
            <div class="navbar-inner">
                <div class="container">
                    <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="#" title="Users" class="brand"> <i class="icon-th-list pull-left"></i>
                    </a>

                    <div class="nav-collapse collapse navbar-responsive-collapse pull-left" id="filters">
                        <div class="pull-right">
                            <ul class="nav">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle dropdown-filters" href="#">
                                        Filters <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li class="nav-header">Filter</li>

                                        <li class="dropdown-submenu">
                                            <a href="#">By staff status</a>
                                            <ul class="dropdown-menu">

                                                <li class="active">
                                                    <a href="?">All</a>
                                                </li>

                                                <li>
                                                    <a href="?is_staff__exact=1">Yes</a>
                                                </li>

                                                <li>
                                                    <a href="?is_staff__exact=0">No</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="#">By superuser status</a>
                                            <ul class="dropdown-menu">

                                                <li class="active">
                                                    <a href="?">All</a>
                                                </li>

                                                <li>
                                                    <a href="?is_superuser__exact=1">Yes</a>
                                                </li>

                                                <li>
                                                    <a href="?is_superuser__exact=0">No</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a href="#">By active</a>
                                            <ul class="dropdown-menu">

                                                <li class="active">
                                                    <a href="?">All</a>
                                                </li>

                                                <li>
                                                    <a href="?is_active__exact=1">Yes</a>
                                                </li>

                                                <li>
                                                    <a href="?is_active__exact=0">No</a>
                                                </li>

                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.nav-collapse -->
                    <div class="pagination pull-left">
                        <ul></ul>
                    </div>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <div class="pull-right">

                            <form action="" method="get" class="navbar-search pull-left" id="search-change-list">
                                <div class="input-append">
                                    <input type="text" placeholder='Search "Users"' name="q" value="" id="searchbar" class="span2">

                                    <button type="submit" class="btn">Search</button>

                                </div>
                            </form>
                            <script type="text/javascript">document.getElementById("searchbar").focus();</script>

                        </div>
                    </div>
                    <!-- /.nav-collapse --> </div>
            </div>
            <!-- /navbar-inner --> </div>
        <form id="changelist-form" action="" method="post" class="with-top-actions">
            <div style='display:none'>
                <input type='hidden' name='csrfmiddlewaretoken' value='sZcKhQZgJkCUVaN7b6CXuntxwjdtHtmw' />
            </div>

            <div class="well">
                <span class="label label-inverse pull-left info-counter">
                    2
                          
                              users
                </span>
                <div class="divider"></div>

                <div class="actions pull-left">
                    <div class="input-append">

                        <label>
                            <span>Action:</span>

                            <select name="action">
                                <option value="" selected="selected">---------</option>
                                <option value="delete_selected">Delete selected users</option>
                            </select>

                        </label>

                        <input type="hidden" class="select-across" value="0" name="select_across" />

                        <button type="submit" class="btn" title="Run the selected action" name="index" value="0">Go</button>
                    </div>
                </div>
                <div class="actions pull-right">

                    <script type="text/javascript">var _actions_icnt="2";</script>
                    <span class="action-counter label label-info">0 of 2 selected</span>

                </div>
            </div>

            <div class="results">
                <table id="result_list" class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col"  class="action-checkbox-column">

                                <div class="text">
                                    <span>
                                        <input type="checkbox" id="action-toggle" />
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable sorted ascending">

                                <div class="sortoptions">
                                    <a class="sortremove" href="?o=" title="Remove from sorting"></a>

                                    <a href="?o=-1" class="toggle ascending" title="Toggle sorting"></a>
                                </div>

                                <div class="text">
                                    <a href="?o=-1">Title</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="?o=2.1">Writer</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="?o=3.1">Published at</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="?o=4.1">Draft</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="?o=5.1">Visible</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $post)
                        <tr class="row{{$post->
                            id}}">
                            <td class="action-checkbox">
                                <input type="checkbox" class="action-select" value="{{$post->id}}" name="_selected_action" /></td>
                            <th>
                                <a href="{{URL::to('dojo/articles/view/$post->id')}}">{{$post->title}}</a>
                            </th>
                            <td>{{$post->author->username}}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <img src="/static/admin/img/icon-yes.gif" alt="True" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </form>
    </div>
</div>

<br class="clear" />

<!-- END Content -->

<div id="footer"></div>
<!-- END Container -->
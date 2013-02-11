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
    
    @if(Session::has('title'))
        <h1>{{ Session::get('message') }}</h1>
    @else 
         <h1>Resultados da pesquisa</h1>
    @endif
    <ul class="object-tools pull-right">

    </ul>
    @if(Session::has('message'))
    <div class="alert alert-error">
                <p id="message">{{ Session::get('message') }}</p>
    </div>
    @endif
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

                    
                    </div>
                    <!-- /.nav-collapse -->
                    <div class="pagination pull-left">
                        <ul></ul>
                    </div>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <div class="pull-right">

                            <form action="articles/search" method="POST" class="navbar-search pull-left" id="search-change-list">
                                <div class="input-append">
                                                {{ Form::text('keyword', '', array('id'=>'keyword')) }}


                                    <button type="submit" class="btn">Search</button>

                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.nav-collapse --> </div>
            </div>
            <!-- /navbar-inner --> </div>
        <form id="changelist-form" action="" method="post" class="with-top-actions">
            <div style='display:none'>
                {{Form::token()}}
            </div>

            <div class="well">
                <span class="label label-inverse pull-left info-counter">
                    {{$count}} Articles

                </span>
                <div class="divider"></div>

                <div class="actions pull-left">
                    <div class="input-append">

                        <label>
                            <span>Action:</span>

                            <select name="action" id="action">
                                <option value="" selected="selected">---------</option>
                                <option value="delete_selected">Delete selected articles</option>
                                <option value="publish_selected">Publish selected articles</option>
                                <option value="draft_selected">Draft selected articles </option>
                            </select>

                        </label>

                        <button type="submit" class="btn" title="Run the selected action" name="index" value="0">Go</button>
                    </div>
                </div>
                <div class="actions pull-right">


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

                                    <a href="" class="toggle ascending" title="Toggle sorting"></a>
                                </div>

                                <div class="text">
                                    <a href="<?php echo URL::current().'/title'?>">Title</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="<?php echo URL::current().'/author_id'?>">Writer</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="<?php echo URL::current().'/created_at'?>">Published at</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="<?php echo URL::current().'/draft'?>">Draft</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                            <th scope="col"  class="sortable">

                                <div class="text">
                                    <a href="<?php echo URL::current().'/visible'?>">Visible</a>
                                </div>
                                <div class="clear"></div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $post)
                        <tr class="row{{$post->id}}">
                            <td class="action-checkbox">
                                <input type="checkbox" class="action-select" value="{{$post->id}}" name="value{{$post->id}}" /></td>
                            <th>
                                <a href="{{URL::to_route('dojo::edit_article',array($post->id))}}">{{$post->title}}</a>
                            </th>
                            <td>{{$post->author->username}}</td>
                            <td>{{$post->created_at}}</td>
                            @if($post->draft == 0)
                              <td>
                                <span class="label label-important">No</span>
                            </td>
                            @else
                              <td>
                                 <span class="label label-success">Yes</span>
                              </td>  
                            @endif
                            @if($post->published == 1)
                                  <td>
                                <span class="label label-success">Yes</span>
                            </td>
                            @else
                            <td>
                                 <span class="label label-important">No</span>
                              </td>  

                            
                            @endif
                 
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
<script type="text/javascript">

    (function ($) {
        fix_positions_on_menu = function (){
          width = Math.max( $(window).innerWidth(), window.innerWidth);
          if(width < '768'){
            $('#filters').addClass('nav-collapse collapse navbar-responsive-collapse');
          }else{
            $('#filters').removeClass('nav-collapse collapse navbar-responsive-collapse');
          }
          if(width <= '768'){
            $('#searchbar').addClass('input-xlarge').removeClass('span2');
          }else{
            $('#searchbar').addClass('span2').removeClass('input-xlarge');
          }
        }
        $(document).ready(function(){
            fix_positions_on_menu();
            $subnav = $('.subnav');
            $subnav.affix({
                offset: {
                    top: function () {
                        $top = 0;
                        width = Math.max( $(window).innerWidth(), window.innerWidth);
                        if(width >= '768'){
                            if(width >= '979'){
                              $top = 80;
                            }else{
                              $top = 120;
                            }
                            if($(window).scrollTop() >= $top){
                                $subnav.addClass('navbar-fixed-top');
                            }else{
                                $subnav.removeClass('navbar-fixed-top');
                            }
                        }
                        return $top;
                    }
                }
            });
        });
        $(window).resize(function(){
            fix_positions_on_menu();
        });
    })(window.jQuery);
    
</script>

<?php
/*
/@todo list
/-Implement search 
*/
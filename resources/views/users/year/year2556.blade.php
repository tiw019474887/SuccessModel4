@section('header')
    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/packages/flexslider/flexslider.css">
@stop


<div class="ui divider condensed"></div>
<div class=" column container">
    <div class="three column row">
        <div class="ui link cards">
            <div class="ui recent-works vertical segment">
                <div class="fourteen wide column">
                    <div class="ui three column aligned stackable  grid">

                        <?php
                        $projects = \App\Models\Project::whereHas('year', function ($a) {
                            $a->where('yearProject', '=', 2556);

                        }, 'status', function ($q) {
                            $q->where('key', '=', 'published');

                        })->limit(6)->get();
                        ?>
                        @foreach($projects as $project)
                            <div class="column">
                                <div class="ui fluid card" style="margin:1px;">
                                    <div class="image">
                                        <?php if(isset($project->logo->url)) : ?>
                                        <img src="<% $project->logo->url %>?w=640&h=380&fit=stretch"/>
                                        <?php else : ?>
                                        <img src="/images/fff.png?w=640&h=280&fit=stretch"/>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <a class="header"><h2><% $project->name %></h2>

                                            <h3><% $project->nameEN %></h3></a>

                                        <div class="meta"><% $project->updated_at->diffForHumans() %></div>

                                        <p>
                                            <% str_limit($project->abstract,100,'...') %>
                                        </p>
                                    </div>
                                    <div class="extra content">
                                        <?php if (isset($project->faculty->name_th)) : ?>
                                            <% $project->faculty->name_th %>
                                          <?php else : ?>

                                          <?php endif; ?>
                                    </div>
                                    <a href="/users/project/<%$project->id%>">
                                        <div class="ui two bottom attached buttons">
                                            <div class="ui inverted violet button">
                                                <p>
                                                    อ่านต่อ
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

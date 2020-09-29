{{--  Hero   --}}
@if ($articles->count()>=5)
    <div class="container">
        <div class="wrapper-tables">
            <div class="table-title">
                <h3 class="no-selectable-text">
                    {{ $title }}
                </h3>
            </div>
            <table class="content-table table-sortable articles" id="data-table">
                <thead>
                    <tr>
                        <th class="titre">
                            <span>Titre</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        <th>
                            <span>Type</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        <th class="source">
                            <span>Source</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        <th class="date-publication">
                            <span>Date de publication</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        <th>
                            <span>Url</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        <th class="auteurs">
                            <span>Auteurs</span>
                            <span class="material-icons">unfold_more</span>
                        </th>
                        @auth
                            <th class="actions">
                                <span>Actions</span>
                                <span class="material-icons">unfold_more</span>
                            </th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        {{--  @if ($article->auteurs->count()>0)  --}}
                            <tr>
                                <td>{{ $article->titre}} </td>
                                <td>{{ $article->type}} </td>
                                <td>{{ $article->source}} </td>
                                <td>{{ $article->date_publication}} </td>
                                <td>{{ $article->url}} </td>
                                <td>
                                    @foreach ($article->auteurs as $auteur)
                                        <div class="auteur">
                                            <span>{{ $auteur->nom }} {{ $auteur->prenom }}</span>
                                        </div>
                                    @endforeach
                                </td>
                                @auth
                                    <td>
                                        <div class="action">
                                            <a href="{{ route('articles.edit',['article'=>$article->id]) }}">
                                                modifier
                                            </a>
                                        </div>
                                        <div class="action">
                                            <form action="{{ route('articles.destroy',['article'=>$article->id]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit">delete</button>
                                            </form>
                                        </div>
                                    </td>
                                @endauth
                            </tr>
                        {{--  @endif  --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endif

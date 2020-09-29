{{--  Search filter  --}}
<div class="container">
    <div class="wrapper-search">
        <form action="{{ route('search-route') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="filter">
                <input type="text" name="titre" class="input" placeholder="Search by titre">
                <input type="text" name="auteur" class="input" placeholder="Search by auteur">
                <input type="text" name="laboratoire" class="input" placeholder="Search by laboratoire">
                <input type="text" name="equipe" class="input" placeholder="Search by equipe">
                <input type="text" name="etablissement" class="input" placeholder="Search by etablissement">
                <button class="filter button" type="submit">
                    <span class="no-selectable-text">Filter</span>
                </button>
            </div>
            <div class="search">
                <input type="text" name="term" class="input" placeholder="Search by term">
                <button class="search button" type="submit">
                    <span class="no-selectable-text">Search</span>
                </button>
            </div>
        </form>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Adidas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories  
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form id="categoryForm" action="{{ route('products.filter') }}" method="post">
                  @csrf
                  <select name="category" id="category" class="form-select">
                      @foreach ($categories as $category)
                          <option value="{{ $category->name }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
              </form>
          </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        </ul>
        <form class="d-flex" method="POST" action="{{route('products.search')}}">
          @csrf
          <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <script>
    $(document).ready(function () {
        $('#category').change(function () {
            // Trigger the form submission when an option is selected
            $('#categoryForm').submit();
        });
    });
</script>
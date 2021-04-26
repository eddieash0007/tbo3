<div class="card sidebar-menu mb-4">
    <div class="card-header">
      <h3 class="h4 card-title">Categories</h3>
    </div>
    <div class="card-body">
      <ul class="nav nav-pills flex-column category-menu">
          @foreach ($bigcategories as $bigcategory)
                  <li><a href="category.html" class="nav-link">{{$bigcategory->name}} <span class="badge badge-secondary">4</span></a>
                      <ul class="list-unstyled">
                      @foreach ($categories as $category)
                          @if ($category->big_category_id === $bigcategory->id)
                              <li><a href="{{ route('category.single', ['slug'=> $category->slug]) }}" class="nav-link">{{$category->name}}</a></li>
                          @endif
                      @endforeach
                      </ul>
                  </li>
          @endforeach
        
      </ul>
    </div>
  </div>
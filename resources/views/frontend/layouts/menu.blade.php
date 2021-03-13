<nav class="@if (isset($mobile)) humberger__menu__nav mobile-menu @else header__menu @endif">
    <ul>
        <li class="active"><a href="{{ route('home') }}">Home</a></li>
        <li><a href="shop-grid.html">Shop</a></li>
        <li><a href="#">Pages</a>
            <ul class="header__menu__dropdown">
                <li><a href="shop-details.html">Shop Details</a></li>
                <li><a href="shoping-cart.html">Shoping Cart</a></li>
                <li><a href="checkout.html">Check Out</a></li>
                <li><a href="blog-details.html">Blog Details</a></li>
            </ul>
        </li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>

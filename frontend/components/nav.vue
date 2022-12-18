<template>
    <div class="nav-wrap container">
        <ul class="nav">
            <li><NuxtLink to="/">index</NuxtLink></li>
            <li><NuxtLink to="/wow">wow</NuxtLink></li>
            <li><NuxtLink to="/map">Google map</NuxtLink></li>
        </ul>
    </div>
</template>

<style>
    .nav {
        display: flex;
    }
    .nav li {
        min-width: 100px;
        text-align: center;
        background: rgba(0,0,0,.2);
        padding: 1rem;
    }
    .nav li:hover {
        background: rgba(0,0,0,.1);
    }

    .nav li a {
        text-transform: uppercase;
        text-decoration: none;
        color: #fff;
    }

    .nav li:hover a {
        text-shadow: 0 0 4px rgba(255,255,255,.9)
    }

    .nav-wrap {
        height: 50px;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }
</style>
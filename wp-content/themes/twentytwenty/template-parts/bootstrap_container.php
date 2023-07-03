<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
            <div class="bootstrap_container">
                <nav class="navbar navbar-default w3_megamenu" role="navigation" style="background-color:#070b13;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        </div>
                        <div id="defaultmenu" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Trang chủ</a></li>
                                <!-- Mega Menu -->
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Vé số</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/zcj/jincai/index?flag=qb">全部</a></li>
                                        <li><a href="/zcj/jincai/index?flag=wd">较稳</a></li>
                                        <li><a href="/zcj/jincai/index?flag=bf">比分</a></li>
                                        <li><a href="/zcj/jincai/index?flag=bqc">半全场</a></li>
                                        <li style="border:solid 1px #292b2e;"></li>
                                        <li><a href="/zcj/jincai/index?flag=sk">赛况</a></li>
                                        <li><a href="/zcj/jincai/index?flag=sd">实单</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Xem kèo</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/zcj/beidan/index?flag=qb">Tất cả</a></li>
                                        <li><a href="/zcj/beidan/index?flag=wd">Kèo ổn định</a></li>
                                        <li><a href="/zcj/beidan/index?flag=bf">Tỷ số</a></li>
                                        <li><a href="/zcj/beidan/index?flag=bqc">Hiệp 1</a></li>
                                        <li style="border:solid 1px #292b2e;"></li>
                                        <li><a href="/zcj/beidan/index?flag=sk">Trực tiếp</a></li>
                                        <li><a href="/zcj/beidan/index?flag=sd">Thời gian</a></li>
                                        <li style="border:solid 1px #292b2e;"></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Xổ số</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="">本期</a></li>
                                        <li><a href="q">上期</a></li>
                                        <li><a href="">防冷</a></li>
                                        <li><a href="">方案推荐 </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Khu VIP</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Giúp đỡ</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/about">Về chúng tôi</a></li>
                                    </ul>
                                    <!-- end dropdown-menu -->
                                </li>
                                <!-- end dropdown-submenu -->
                            </ul>
                            <!-- end dropdown-menu -->
                            </li><!-- end standard drop down -->
                            <!-- end dropdown w3_megamenu-fw -->
                            </ul><!-- end nav navbar-nav -->
                        </div>
                    </div>
                    <!-- end #navbar-collapse-1 -->
                </nav>
                <!-- end navbar navbar-default w3_megamenu -->
            </div>
            <!-- end container -->

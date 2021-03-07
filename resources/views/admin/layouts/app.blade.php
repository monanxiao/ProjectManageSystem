<!DOCTYPE html>
<html lang="en">

	<!-- 引入头部样式 -->
	@include('admin.layouts._head')

	<body data-type="index">
    	<script src="/assets/js/theme.js"></script>

    	<div class="am-g tpl-g">

    		<!-- 引入头部 -->
    		@include('admin.layouts._header')

    		<!-- 引入风格切换 -->
    		@include('admin.layouts._styleswitchover')

    		<!-- 引入侧边导航栏 -->
    		@include('admin.layouts._left-nav')

			<div class="tpl-content-wrapper">

	    		<!-- 内容区域 -->
	    		@yield('content')

			</div>

    	</div>

        
    	<!-- 引入底部 -->
    	@include('admin.layouts._footer')
	</body>

</html>
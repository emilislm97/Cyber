<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row font-size-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                <a class="font-w600" href="javascript:void(0)">Əliyeva Şəhla</a> <i class="fa fa-heart text-danger"></i> tərəfindən hazırlanıb
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                <a class="font-w600" href="https://yuptechnology.com" target="_blank">AzTU-Cyber</a> &copy; <span>2021 {{date('Y') == '2021' ? '' : '- '.date('Y')}}</span>
            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->
</div>
<!-- END Page Container -->

<script src="{{asset('assets/js/main.core.min.js')}}"></script>
<script src="{{asset('assets/js/main.app.min.js')}}"></script>
@yield('js')
</body>
</html>

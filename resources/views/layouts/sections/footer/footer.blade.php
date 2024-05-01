<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div
        class="{{ !empty($containerNav) ? $containerNav : 'container-fluid' }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>, created by <a href="https://vitorernandes.com" target="_blank"
                class="footer-link fw-medium">Vitor
                Ernandes</a>
        </div>
        <div class="d-none d-lg-inline-block">
            <a href="{{ config('variables.licenseUrl') ? config('variables.licenseUrl') : '#' }}" class="footer-link me-4"
                target="_blank">Licença</a>
        </div>
    </div>
</footer>
<!--/ Footer-->

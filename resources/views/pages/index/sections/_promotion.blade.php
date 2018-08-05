<section class="promotion">
    <div class="container wrapper">
        <div class="row">
            <div class="col-12">
                <h2>Most wanted watches</h2>
            </div>
        </div>
        <div class="box position-relative">
            <div class="carousel d-lg-flex justify-content-between">
                <div class="item text-center mb-5 mb-sm-0">
                    <img src="{{ asset('images/watches/watch1.png') }}" alt="">
                </div>
                <div class="item text-center mb-5 mb-sm-0">
                    <img src="{{ asset('images/watches/watch2.png') }}" alt="">
                </div>
                <div class="item text-center">
                    <img src="{{ asset('images/watches/watch3.png') }}" alt="">
                </div>
            </div>
            <div class="next">
                <i class="fas fa-angle-right"></i>
            </div>
            <div class="prev">
                <i class="fas fa-angle-left"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <span>Special price: $89.99</span>
                <a class="btn" href="{{ route('shop') }}">Add to cart</a>
            </div>
        </div>
    </div>
</section>

@push ('content-scripts')
    <script src="{{ asset('js/siema.min.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            let siema = null;
            const carousels = document.querySelectorAll('.carousel');

            initSiema();

            window.addEventListener('resize', () => {
                initSiema();
            });

            document.querySelector('.next').addEventListener('click', () => {
                if (siema != null) {
                    siema.next();
                }
            });

            document.querySelector('.prev').addEventListener('click', () => {
                if (siema != null) {
                    siema.prev();
                }
            });

            function initSiema() {
                if (window.innerWidth <= 992 && siema == null) {
                    for (const carousel of carousels) {
                        siema = new Siema({
                            selector: carousel,
                            duration: 200,
                            easing: 'ease-out',
                            perPage: 1,
                            startIndex: 0,
                            draggable: true,
                            multipleDrag: true,
                            threshold: 20,
                            loop: true,
                            rtl: false
                        });
                    }
                } else if (window.innerWidth > 992) {
                    if (siema != null) {
                        siema.destroy(true);
                    }
                    siema = null;
                }
            }
        });
    </script>
@endpush
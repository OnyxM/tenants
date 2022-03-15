@extends("app.layout")

@section("content")
    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading">
                                <h2>Liste des Familles</h2>
                            </div>
                        </div>
                    </div>
                    <div class="catsec">
                        <div class="row">
                            @foreach($familles as $fam)
                                <div class="col-lg-6 col-md-6">
                                    <a href="{{route('famille.details', ['famille_slug'=>$fam->slug])}}">
                                        <div class="cate-widget">
                                            <?php $c = rand(1,6); ?>
                                            <img src="{{asset("assets/img/category/category-0$c.jpg")}}" alt="">
                                            <div class="cate-title">
                                                <h3><span><i class="fas fa-circle"></i> {{ucwords($fam->name)}}</span></h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-lg-6 col-md-6">
                                <a href="{{route('famille.add')}}">
                                    <div class="cate-widget">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAY1BMVEX///8AAAAEBAT8/PylpaV+fn6YmJj5+fkICAjBwcH19fXh4eHs7Oybm5va2trS0tJISEi5ubmGhoavr689PT1kZGQlJSWRkZHMzMwuLi4YGBhYWFgfHx9RUVF1dXU1NTVtbW2YE51eAAAE7ElEQVR4nO2dDXeiOhCGCaEiHyoqqBVL9///yk1C7bWVi4kJZsK+T0/PHvvBztOBCeAkRBEAAAAAAAAAAAAAAAAAAAAAIcEfvA4e/vul+Jid5E/L+elJ0mKzaurPz7o6ZutSWc5KtDw27IaqW89IUIhkLbvjsk2jOVhKg/yDsfi3oPhCe5qDoWClhH4rqi/sSt/BOaD80+fvzlA4LlldBJ/FvGFC5D6FV8X3te8IbRDjer68LzE/NZencLMoTltkBgeqzM3BGLNzGW694VE3nkG5p4qxMdhyk0Z7Np5C9d2YdaHmkKfL4TL6I4dSMgtQUUXcDZXQIT7DE1SsD3qGYszY+o71OXaqVGoYxuzDd6zPwKPBcX7IUHyefIf7DNtr9DpJXPiO9hnedOS+8R3tE+SVvp7IdOo7XnMKkwzGbO87XnPWRjsp2/mO15zN7A1XZoZvvuM1B4YwpM/8DRcwhCF5YAhD+sAQhvSBIQzpA0MY0geGMKQPDGFIHxjCkD4wDN9w/nf1YRi+YWJmSOBdbn6dx7PJkub9YcRnvZ69/3jQTCw4tIssm7bHT2y93LWPQ+kxU9T96Y/ulE7Uq8nTKMqaxyE8J6i5TbXRKpmobZpv2pv/Zor4NX5CtU2zKptCMEouautT+Wls+ub7b267xFKxh+bNpHJmiEDeC5eGYqcvWlnsqCjKqSgHt1NRypp9TR0ggTRkl427gsPztu+p9212RRnKCUXOSqrq2J6shpoT9yWvyt0YctMTsNfRucqhb5H/ZemiAV78lY7TDfJWyILqwFAMFLonoi9G/NmdTEXhIoWExokbVOlrrI9EsYGLb5VRNvYjRubbYRwH9wYM75m9mndrwbT27TDO2foMPPet8AjrqSgFodPRAWKW2BoSLzTMftYb2XPSK9a3IYmXUgfDBXlD6+uLhHShEcEdbXNoOAXt9VjX0pzopdM3DgyJY31zmH/4VhjnYHtrmFMvNZVtCkWpIXqJ/4WLGdIGs85fz9nFOlN73xZj7KwXYBS/X3761hihjFIHa0yKy4slwUFR3mrrrOUkPKqFIcF6Ezt5i03tAXIpHd86gzhZuEcpEr0MPjp77ymNdr5lhmjle9POUIqEdlURyp/cnZ5sNVkwzVWfXoG6n+98RZv9hU4SRRyLCTpqCoN2oampMpeH4Dd8e/Zt9kUiTmUmWnYp0c6j+Q6te5RXq0nXlErXSX3QS+UEZ0Hx4bDbOC2hw/D1NnmM4VHbamxyf3qBnT6GN8sNbuxOvYyk1sUKf6YLWvMyiMw6mfOfjQBDGNIHhjCkDwxhSB8YwpA+MIQhfWAIQ/rAEIb0gSEM6QNDGNIHhv+cIYEVeEwJb40hU7azN5z/05Dm/0Sr4qw9yz3IxwPyiDe6XUNqURHfAZsiBPUbNmUzlP2UbA8U+ksxBPnovMhoSZSzWhKJTKeMLplmN5565nGQlLVmv+GShfqA9T1bauUwxNNuBU9bnQy6XnvtlXDNZ5Huradn+SNj40Oimm1kPZPXK4txxbh/YnWwGZR0o0OGyGBDqu/XHJ6uxvfTLnBBuQOOXgofA3yW8z1lxwZWJVQrrTpYx4oAwmFb904/Hc9J8HuopM8R394N/rXwS2eSwf7f9NhU10kmdbMrUnUROTPyTaY4lf3rcM9kAAAAAAAAAAAAAAAAAAAAwL/JX8R7SOrOpH5pAAAAAElFTkSuQmCC" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Category Section -->
@endsection

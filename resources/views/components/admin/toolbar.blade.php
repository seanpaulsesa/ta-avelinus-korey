
                                    <div class="row align-items-center">
                                        @if(auth()->user()->hasRole('admin'))
                                        <div class="col-lg-6">
                                            <a href="{{ $btnCreate }}" class="btn btn-primary">
                                                <span class="btn-label">
                                                <i class="fa fa-plus"></i>
                                                </span>
                                                Buat Baru
                                            </a>
                                        </div>
                                        @endif
                                        <div class="{{ auth()->user()->hasRole('admin') ? 'col-lg-6 px-2' : 'col-lg-12 px-2' }}">
                                            <form action="{{ $formAction }}" method="GET">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" name="search" placeholder="Cari nama anggota..." value="{{ request()->search ?? old('search') }}">
                                                        <span class="input-icon-addon">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
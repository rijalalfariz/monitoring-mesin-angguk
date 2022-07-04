@extends('base')

@section('content')
    <div class="d-flex">
        <x-sidebar>
        </x-sidebar>
        <div class="main-content flex-column">
            <x-navbar>
            </x-navbar>
            <div class="content">
                @csrf

                <div class="fs-18 ff-bold my-3">Sumur Pakai Elektrik Motor</div>

                <div class="device-table">
                    <div class="head-table">
                        <span class="head-table-text" style="width: 48px; min-width: 28px;">No.</span>
                        <span class="head-table-text" style="width: 180px; min-width: 108px;">Nama Mesin</span>
                        <span class="head-table-text" style="width: 120px; min-width: 108px;">Status Mesin</span>
                        <span class="head-table-text" style="width: 180px; min-width: 120px;">Kuota</span>
                        <span class="head-table-text" style="width: 60px; min-width: 60px;">Baterai</span>
                        <span class="head-table-text" style="width: 60px; min-width: 36px;">Ampere</span>
                        <span class="head-table-text text-center" style="width: 120px">Aksi</span>
                    </div>
                    <div class="table-content">
                        @forelse ($devices_ampere as $device)
                            <div class="table-content-item
                                @if($loop->index%2!=0) 
                                odd
                                @endif
                             " data-deviceid="{{ $device->id }}">
                                <span class="head-table-text" style="width: 48px; min-width: 28px;">{{ $loop->index + 1 }}</span>
                                <span class="head-table-text DeviceName" style="width: 180px; min-width: 108px;" data-name="{{ $device->name }}">{{ $device->name }}</span>
                                <span class="head-table-text status{{ $device->status }} DeviceStatus ff-bold" style="width: 120px; min-width: 108px;">
                                @if ($device->status == 1)
                                    Berjalan
                                @else
                                    Berhenti
                                @endif
                                </span>
                                <span class="head-table-text DeviceQuota elipsis1 pointable" style="width: 180px; min-width: 120px;" data-toggle="tooltip" data-placement="right" data-title="{{  $device->quota }}"
                                    data-template='
                                    <div class="tooltip" role="tooltip" style="max-width: 300px;"><div class="arrow"></div><div class="tooltip-inner fs-12" style="max-width: 300px;"></div></div>
                                    '
                                    >{{ $device->quota }}</span>
                                <span class="head-table-text DeviceBattery" style="width: 60px; min-width: 60px;">{{ $device->battery }} %</span>
                                <span class="head-table-text DeviceAmpere" style="width: 60px; min-width: 36px;">{{ $device->ampere }}</span>
                                <span class="head-table-text text-center d-flex justify-content-center AcitionColumn" style="width: 120px">
                                    <button class="OriginalBtnGroup aksi-button bg-f0 mr-3 EditBtn">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.4998 7.64331e-05L15.4998 3.00009L5.49983 13.0001L2.49968 10.0001L12.4998 7.64331e-05Z" fill="white"/>
                                            <path d="M1.5 11.0001L4.49976 14.0001L1.49992 14.0001L1.5 11.0001Z" fill="white"/>
                                        </svg>                                            
                                    </button>
                                    <button class="OriginalBtnGroup aksi-button DeleteBtn">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 3L12 3L11.1213 16L1 16L0 3Z" fill="#F05454"/>
                                            <path d="M0 2L12 2L11.1213 -4.59374e-08L1 -4.72516e-07L0 2Z" fill="#F05454"/>
                                        </svg>                                            
                                    </button>
                                    <button class="EditBtnGroup aksi-button bg-54 mr-3 UpdateDevice" style="display: none">
                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.1136 13.725L0.263593 7.62349C-0.0878643 7.25692 -0.0878643 6.66256 0.263593 6.29596L1.53636 4.96843C1.88781 4.60182 2.4577 4.60182 2.80915 4.96843L6.75 9.07869L15.1908 0.274927C15.5423 -0.0916425 16.1122 -0.0916425 16.4636 0.274927L17.7364 1.60246C18.0879 1.96903 18.0879 2.56338 17.7364 2.92998L7.3864 13.7251C7.0349 14.0916 6.46506 14.0916 6.1136 13.725V13.725Z" fill="white"/>
                                        </svg>
                                    </button>
                                    <button class="aksi-button EditBtnGroup CancelUpdateDevice" style="display: none">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.3432 7.5L14.6075 3.23565C15.1308 2.71236 15.1308 1.86392 14.6075 1.3402L13.6598 0.392472C13.1365 -0.130824 12.2881 -0.130824 11.7643 0.392472L7.5 4.65682L3.23565 0.392472C2.71236 -0.130824 1.86392 -0.130824 1.3402 0.392472L0.392472 1.3402C-0.130824 1.86349 -0.130824 2.71193 0.392472 3.23565L4.65682 7.5L0.392472 11.7643C-0.130824 12.2876 -0.130824 13.1361 0.392472 13.6598L1.3402 14.6075C1.86349 15.1308 2.71236 15.1308 3.23565 14.6075L7.5 10.3432L11.7643 14.6075C12.2876 15.1308 13.1365 15.1308 13.6598 14.6075L14.6075 13.6598C15.1308 13.1365 15.1308 12.2881 14.6075 11.7643L10.3432 7.5Z" fill="#F05454"/>
                                        </svg>
                                    </button>
                                </span>    
                            </div>                            
                        @empty
                            <div class="text-center pt-4">Belum ada data</div>                        
                        @endforelse
                        
                    </div>

                </div>

                <div class="fs-18 ff-bold mb-3 mt-5">Sumur Pakai Gas Engine</div>

                <div class="device-table">
                    <div class="head-table">
                        <span class="head-table-text" style="width: 48px; min-width: 28px;">No.</span>
                        <span class="head-table-text" style="width: 180px; min-width: 108px;">Nama Mesin</span>
                        <span class="head-table-text" style="width: 120px; min-width: 108px;">Status Mesin</span>
                        <span class="head-table-text" style="width: 180px; min-width: 120px;">Kuota</span>
                        <span class="head-table-text" style="width: 60px; min-width: 60px;">Baterai</span>
                        <span class="head-table-text" style="width: 60px; min-width: 36px;">Tegangan</span>
                        <span class="head-table-text text-center" style="width: 120px">Aksi</span>
                    </div>
                    <div class="table-content">
                        @forelse ($devices_tegangan as $device)
                            <div class="table-content-item
                                @if($loop->index%2!=0) 
                                odd
                                @endif
                            " data-deviceid="{{ $device->id }}">
                                <span class="head-table-text" style="width: 48px; min-width: 28px;">{{ $loop->index + 1 }}</span>
                                <span class="head-table-text DeviceName" style="width: 180px; min-width: 108px;" data-name="{{ $device->name }}">{{ $device->name }}</span>
                                <span class="head-table-text status{{ $device->status }} DeviceStatus ff-bold" style="width: 120px; min-width: 108px;">
                                @if ($device->status == 1)
                                    Berjalan
                                @else
                                    Berhenti
                                @endif
                                </span>
                                <span class="head-table-text DeviceQuota elipsis1 pointable" style="width: 180px; min-width: 120px;" data-toggle="tooltip" data-placement="right" data-title="{{  $device->quota }}"
                                    data-template='
                                    <div class="tooltip" role="tooltip" style="max-width: 300px;"><div class="arrow"></div><div class="tooltip-inner fs-12" style="max-width: 300px;"></div></div>
                                    '
                                    >{{ $device->quota }}</span>
                                <span class="head-table-text DeviceBattery" style="width: 60px; min-width: 60px;">{{ $device->battery }} %</span>
                                <span class="head-table-text DeviceTegangan" style="width: 60px; min-width: 36px;">{{ $device->tegangan }}</span>
                                <span class="head-table-text text-center d-flex justify-content-center AcitionColumn" style="width: 120px">
                                    <button class="OriginalBtnGroup aksi-button bg-f0 mr-3 EditBtn">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.4998 7.64331e-05L15.4998 3.00009L5.49983 13.0001L2.49968 10.0001L12.4998 7.64331e-05Z" fill="white"/>
                                            <path d="M1.5 11.0001L4.49976 14.0001L1.49992 14.0001L1.5 11.0001Z" fill="white"/>
                                        </svg>                                            
                                    </button>
                                    <button class="OriginalBtnGroup aksi-button DeleteBtn">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 3L12 3L11.1213 16L1 16L0 3Z" fill="#F05454"/>
                                            <path d="M0 2L12 2L11.1213 -4.59374e-08L1 -4.72516e-07L0 2Z" fill="#F05454"/>
                                        </svg>                                            
                                    </button>
                                    <button class="EditBtnGroup aksi-button bg-54 mr-3 UpdateDevice" style="display: none">
                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.1136 13.725L0.263593 7.62349C-0.0878643 7.25692 -0.0878643 6.66256 0.263593 6.29596L1.53636 4.96843C1.88781 4.60182 2.4577 4.60182 2.80915 4.96843L6.75 9.07869L15.1908 0.274927C15.5423 -0.0916425 16.1122 -0.0916425 16.4636 0.274927L17.7364 1.60246C18.0879 1.96903 18.0879 2.56338 17.7364 2.92998L7.3864 13.7251C7.0349 14.0916 6.46506 14.0916 6.1136 13.725V13.725Z" fill="white"/>
                                        </svg>
                                    </button>
                                    <button class="aksi-button EditBtnGroup CancelUpdateDevice" style="display: none">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.3432 7.5L14.6075 3.23565C15.1308 2.71236 15.1308 1.86392 14.6075 1.3402L13.6598 0.392472C13.1365 -0.130824 12.2881 -0.130824 11.7643 0.392472L7.5 4.65682L3.23565 0.392472C2.71236 -0.130824 1.86392 -0.130824 1.3402 0.392472L0.392472 1.3402C-0.130824 1.86349 -0.130824 2.71193 0.392472 3.23565L4.65682 7.5L0.392472 11.7643C-0.130824 12.2876 -0.130824 13.1361 0.392472 13.6598L1.3402 14.6075C1.86349 15.1308 2.71236 15.1308 3.23565 14.6075L7.5 10.3432L11.7643 14.6075C12.2876 15.1308 13.1365 15.1308 13.6598 14.6075L14.6075 13.6598C15.1308 13.1365 15.1308 12.2881 14.6075 11.7643L10.3432 7.5Z" fill="#F05454"/>
                                        </svg>
                                    </button>
                                </span>    
                            </div>
                        @empty
                            <div class="text-center pt-4">Belum ada data</div>
                        @endforelse
                        
                    </div>

                </div>

                {{-- @forelse ($devices as $device)
                    <div class="device-card d-inline-block shadow-big" data-deviceid="{{ $device->id }}">
                        <div class="device-card-inner d-flex align-items-between bg-white py-5 px-3">
                            <div class="device-number bg-30 d-flex justify-content-center align-items-center mr-3 ff-bold">{{ $loop->index+1 }}</div>
                            <div class="device-text div-grow mr-3">
                                <div class="DeviceName device-name ff-bold fs-16" data-name="{{ $device->name }}">
                                    {{ $device->name }}
                                </div>
                                <div class="DeviceStatus device-status fs-16 ff-bold fc-54 @if ($device->status == 0) status0 @endif">
                                    @if ($device->status == 1)
                                        Berjalan
                                    @else
                                        Berhenti
                                    @endif
                                </div>
                                <div class="device-detail">
                                    <div class=" mb18">
                                        <div class="mr-5 ff-semibold">Battery</div>
                                        <div class="DeviceBattery ml-3">{{ $device->battery }} %</div>
                                    </div>
                                    <div class="">
                                        <div class="mr-5 ff-semibold">Quota</div>
                                        <div class="DeviceQuota ml-3">{{ $device->quota }}</div>
                                    </div>
                                </div>
                                </div>
                            <div class="flex-column between-end">
                                <div class="ActionButtonGroup">
                                    <div class="d-flex" style="width: 80px;">
                                        <button class="OriginalBtnGroup aksi-button bg-f0 mr-3 EditBtn">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4998 7.64331e-05L15.4998 3.00009L5.49983 13.0001L2.49968 10.0001L12.4998 7.64331e-05Z" fill="white"/>
                                                <path d="M1.5 11.0001L4.49976 14.0001L1.49992 14.0001L1.5 11.0001Z" fill="white"/>
                                            </svg>                                            
                                        </button>
                                        <button class="OriginalBtnGroup aksi-button DeleteBtn">
                                            <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 3L12 3L11.1213 16L1 16L0 3Z" fill="#F05454"/>
                                                <path d="M0 2L12 2L11.1213 -4.59374e-08L1 -4.72516e-07L0 2Z" fill="#F05454"/>
                                            </svg>                                            
                                        </button>
                                        <button class="EditBtnGroup aksi-button bg-54 mr-3 UpdateDevice" style="display: none">
                                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.1136 13.725L0.263593 7.62349C-0.0878643 7.25692 -0.0878643 6.66256 0.263593 6.29596L1.53636 4.96843C1.88781 4.60182 2.4577 4.60182 2.80915 4.96843L6.75 9.07869L15.1908 0.274927C15.5423 -0.0916425 16.1122 -0.0916425 16.4636 0.274927L17.7364 1.60246C18.0879 1.96903 18.0879 2.56338 17.7364 2.92998L7.3864 13.7251C7.0349 14.0916 6.46506 14.0916 6.1136 13.725V13.725Z" fill="white"/>
                                            </svg>
                                        </button>
                                        <button class="aksi-button EditBtnGroup CancelUpdateDevice" style="display: none">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.3432 7.5L14.6075 3.23565C15.1308 2.71236 15.1308 1.86392 14.6075 1.3402L13.6598 0.392472C13.1365 -0.130824 12.2881 -0.130824 11.7643 0.392472L7.5 4.65682L3.23565 0.392472C2.71236 -0.130824 1.86392 -0.130824 1.3402 0.392472L0.392472 1.3402C-0.130824 1.86349 -0.130824 2.71193 0.392472 3.23565L4.65682 7.5L0.392472 11.7643C-0.130824 12.2876 -0.130824 13.1361 0.392472 13.6598L1.3402 14.6075C1.86349 15.1308 2.71236 15.1308 3.23565 14.6075L7.5 10.3432L11.7643 14.6075C12.2876 15.1308 13.1365 15.1308 13.6598 14.6075L14.6075 13.6598C15.1308 13.1365 15.1308 12.2881 14.6075 11.7643L10.3432 7.5Z" fill="#F05454"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="DetailBtn detail-btn bg-f0 circle48 center-middle">
                                    <svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.22276 12.6552L0.321959 3.12177C-0.10732 2.66198 -0.10732 1.91654 0.32196 1.4568L1.3601 0.344878C1.78864 -0.114127 2.48319 -0.11501 2.91274 0.342915L10 7.89832L17.0873 0.342869C17.5168 -0.115056 18.2114 -0.114175 18.6399 0.34483L19.678 1.45675C20.1073 1.91654 20.1073 2.66198 19.678 3.12172L10.7772 12.6552C10.348 13.1149 9.65204 13.1149 9.22276 12.6552Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>    
                @empty
                            
                @endforelse --}}

            </div>
        </div>
        
    </div>
    
    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin ingin menghapus "<span class="DeviceName"></span>" ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Perangkat yang sudah dihapus harus diinstall ulang untuk menyalakannya kembali
            </div>
            <div class="modal-footer">
              <button type="button" class="btn fix bg-f0 shadow-big" data-dismiss="modal">Batal</button>
              <button id="DeleteDevice" type="button" class="btn fix bg-ff shadow-big" data-id-device="">Hapus</button>
            </div>
          </div>
        </div>
      </div>
@endsection
<div>
    <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Appointments</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('admin.appointment')}}">Dashboard</a></li>
             <li class="breadcrumb-item active">Appointments</li>
           </ol>
         </div>
       </div>

               <div class="row mt-4">
                 <div class="col-12">
                     <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.appointments.create') }}">
                            <button type="button" class="btn mb-2 bg-gradient-primary"><i class="fa fa-plus-circle mr-1"></i>Add New Appointment</button>
                        </a>
                     </div>
                   <div class="card">
                     <div class="card-header">
                       <h3 class="card-title">Appointment List</h3>
       
                       <div class="card-tools">
                        <x-search-input wire:model="searchAppointment" :target="'searchAppointment'"/>
                       </div>
                     </div>
                     
                     <div class="card-body table-responsive p-0">
                       <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                             <th>ID</th>
                             <th>Client Name</th>
                             <th>Date</th>
                             <th>Time</th>
                             <th>Status</th>
                             <th>Options</th>
                           </tr>
                         </thead>
                         <tbody>
                            @php
                                 $i = 1;
                             @endphp
                          @forelse ($appointments as $appointment)
                                                         
                           <tr>
                            <td>{{$i++}}</td>
                            <td>{{$appointment->client->name}}</td>
                            <td>{{$appointment->date}}</td> {{-- function created on AppServiceProvider.php --}}
                            <td>{{$appointment->time}}</td>  {{-- function created on AppServiceProvider.php --}}
                            <td>
                              <span class="badge badge-{{$appointment->status_badge}}">{{$appointment->status}}</span>  {{-- 'status_badge' is created on Appointment.php Model file--}}
                            </td>
                            <td>
                                <a href="{{route('admin.appointments.edit', $appointment)}}"><i class="fa fa-edit mr-2"></i></a>
                                <a href="" wire:click.prevent="confirmAppointmentRemobval({{$appointment->id}})"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="6" class="text-center">
                              <img src="{{asset('img')}}/icon/undraw_void_-3-ggu.svg" alt="No result found" width="100px">
                              <h3 class="mt-2">No result found</h3>
                            </td>
                          </tr>
                          @endforelse
                           
                         </tbody>
                       </table>
                     </div>
                    <div class="card-footer d-flex justify-content-end">
                     
                    </div>
                   </div>
                   
                 </div>
               </div>
               
     </div> 
   </div>
   <x-confirmation-alert/>
 </div>
 
 
 
 
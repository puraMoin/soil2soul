@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')


     
    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2'><h6>Page Name</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->page_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Page Title</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->page_title }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Page Url</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->page_url }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Link</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->link }}</p>
                        </td>
                    </tr>  
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($seomodule->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Meta Keyword</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->meta_keyword }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Meta Description</h6></th>
                        <td class=''>
                            <p>{{ $seomodule->meta_description }}</p>
                        </td>
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $seomodule->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $seomodule->updated_at }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    

</div>


    <!--Add new section end here-->
	</div>
</section>	
@endsection


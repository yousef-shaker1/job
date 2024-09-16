@extends('layouts.master_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@endsection

@section('title')
Customer_Messages 
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
      @if (session()->has('delete'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('delete') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered text-md-nowrap">
                        <thead class="bg-primary text-white">
                            <tr>
                              <th class="border-bottom-0">#</th>
                              <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Message</th>
                                <th class="border-bottom-0">Operation</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1?>
                            @foreach ($Customer_Messages as $Customer_Message)
                            <tr>
                            
                            <td>{{ $i }}</td>
                            <td>{{ $Customer_Message->name }}</td>
                            <td>{{ $Customer_Message->email }}</td>
                            <td>{{ $Customer_Message->message }}</td>
                            <td>
                              <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                              data-id="{{ $Customer_Message->id }}" data-message="{{ $Customer_Message->message }}" data-toggle="modal"
                              href="#modaldemo9" title="حذف" style="width: 50px;">حذف<i class="las la-trash"></i>
                            </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center my-4">
                      @if ($Customer_Messages->hasPages())
                      <ul class="pagination justify-content-center">
                          <!-- زر الصفحة السابقة -->
                          @if ($Customer_Messages->onFirstPage())
                              <li class="page-item disabled"><span class="page-link">السابق</span></li>
                          @else
                              <li class="page-item"><a href="{{ $Customer_Messages->previousPageUrl() }}" class="page-link" rel="prev">السابق</a></li>
                          @endif
                  
                          <!-- أرقام الصفحات -->
                          @foreach(range(1, $Customer_Messages->lastPage()) as $page)
                              <li class="page-item {{ $page == $Customer_Messages->currentPage() ? 'active' : '' }}">
                                  <a href="{{ $Customer_Messages->url($page) }}" class="page-link">{{ $page }}</a>
                              </li>
                          @endforeach
                  
                          <!-- زر الصفحة التالية -->
                          @if ($Customer_Messages->hasMorePages())
                              <li class="page-item"><a href="{{ $Customer_Messages->nextPageUrl() }}" class="page-link" rel="next" >التالي</a></li>
                          @else
                              <li class="page-item disabled"><span class="page-link">التالي</span></li>
                          @endif
                      </ul>
                  @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    <!-- row closed -->

<div class="modal" id="modaldemo9">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-content-demo">
          <div class="modal-header">
              <h6 class="modal-title">delete message</h6><button aria-label="Close" class="close"
                  data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <form action="{{ route('Customer_Message.destroy', $i) }}" method="post">
              @method('delete')
              @csrf
              <div class="modal-body">
                  <p>هل انت متاكد من عملية الحذف ؟</p><br>
                  <input type="hidden" name="id" id="id" value="" readonly>
                  <input class="form-control" name="message" id="message" type="text" readonly>
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" style="width: 50px;">تاكيد</button>
              </div>
      </div>
          </form>
  </div>
</div>

    </div>
    <!-- Container closed -->
    </div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#modaldemo9').on('show.bs.modal', function(event) {
            // الحصول على الزر الذي أطلق الحدث
            var button = $(event.relatedTarget);
            // استخراج المعلومات من سمات البيانات
            var id = button.data('id');
            var message = button.data('message');
            // تحديث محتوى الحقول في النموذج داخل الـ modal
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #message').val(message);
        });
    });
</script>
@endsection
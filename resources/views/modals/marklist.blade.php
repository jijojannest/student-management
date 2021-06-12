<div class="modal-dialog list-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Marksheet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                        @foreach ($subjects as $subject)
                            <th scope="col">{{$subject->name}}</th>
                        @endforeach
                    
                    <th scope="col">Term</th>
                    <th scope="col">Total Marks</th>
                    <th scope="col">Created On</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($term1_records) > 0 || count($term2_records) > 0)
                        @foreach ($term1_records as $key=>$record)
                        @if(count($record->marks) >0)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$record->name}}</td>
                            <?php $total_marks = 0;?>
                                @foreach ($record->marks as $mark)
                                    <td>{{$mark->marks}}</td>
                                    <?php $total_marks += $mark->marks;?>
                                @endforeach
                            
                            <td>One</td>
                            <td>{{$total_marks}}</td>
                            <td>{{date('Y-m-d g:i A',strtotime($record->marks[0]->created_at))}}</td>
                          
                        </tr>
                        @endif
                        @endforeach

                        
                        @foreach ($term2_records as $key=>$record)
                        @if(count($record->marks) >0)
                        <tr>
                            <th scope="row">{{$key+count($term1_records)+1}}</th>
                            <td>{{$record->name}}</td>
                            <?php $total_marks = 0;?>
                                @foreach ($record->marks as $mark)
                                <?php $total_marks += $mark->marks;?>
                                    <td>{{$mark->marks}}</td>
                                @endforeach
                            
                            <td>Two</td>
                            <td>{{$total_marks}}</td>
                            <td>{{date('Y-m-d g:i A',strtotime($record->marks[0]->created_at))}}</td>
                          
                        </tr>
                        @endif
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="6">No Records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
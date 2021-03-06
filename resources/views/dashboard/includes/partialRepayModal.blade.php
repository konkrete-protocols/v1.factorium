<div id="partialRepayModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Partial Repay</h4>
      </div>
      <div class="modal-body text-center">
        @if($balanceAudk) <h4 class="text-center">
          @if(isset(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->audk_default_project_id))
          @if($project->investment->total_projected_costs > $balanceAudk->balance)
          Buyer does not have sufficient AUDC to repay
          @endif
        @endif</h4>
        @endif
        <p style="font-size: 20px;">Buyer is about to partial repay <b><i>{{$project->title}}</i></b> for <b>${{$project->investment->total_projected_costs}}</b></p>
      </div>
      <div class="modal-footer">
        @if($balanceAudk)
        <h4 class="text-center">
          <form action=" {{route('dashboard.investment.declareFixedDividend', [$project->id])}}" method="POST" id="partialRepayForm">
            {{csrf_field()}}
            <span class="declare-fixed-statement "><small><input type="number" name="fixed_dividend_percent" id="fixedDividendPercent" step="0.01" min="1" max="100" required> % </small></span>
            <input type="hidden" class="investors-list" id="partialInvestor_list" name="investors_list">
            <button class="btn btn-primary declare-partial-repay-btn" type="button" data-toggle="modal" data-target="#partial_repay_confirm_modal" id="partialRepayPercentBtn">Repay</button>
            <input type="submit" id="validation_partial_repay" class="btn btn-default" value="Repay" style="display: none;">
          </form>
        </h4>
        @endif
      </div>
    </div>

  </div>
</div>

<!--Partial Repay confirm Modal -->
<div id="partial_repay_confirm_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:90%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CONFIRM PARTIAL REPAY</h4>
      </div>
      <div class="modal-body" style="padding: 15px 30px;">
        <p class="text-center">
          <i><small>** Please check and confirm the below partial repay details.</small></i>
        </p><br>
        <div class="text-center">
          <h2>{{$project->title}}</h2>
        </div><br>
        <table class="table-striped dividend-confirm-table" border="0" cellpadding="10">
          <tbody>
            <tr>
              <td><b>Rate: </b></td>
              <td><small><span id="modal_partial_repay_rate"></span>%</small></td>
            </tr>
          </tbody>
        </table>
        <br>
        {{-- <h2 class="text-center">Dividend calculation preview</h2><br> --}}
        <div id="calculation_preview_table" style="width: 100%; overflow-x: auto;">
          @foreach($shareInvestments as $shareInvestment)
          <table class="table">
            <thead>
              <tr>
                <th>Financier Name</th>
                <th>Financier Wallet address</th>
                <th>Buyer Entity Name</th>
                <th>Buyer wallet Address</th>
                <th>Financier Account</th>
                <th>Invoice amount</th>
                <th>Partial Repayment</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$shareInvestment->user->first_name}} {{$shareInvestment->user->last_name}}</td>
                <td>{{$shareInvestment->user->wallet_address}}</td>
                <td>{{$buyer->entity_name}}</td>
                <td>{{$buyer->wallet_address}}</td>
                <td>@if($shareInvestment->investingJoint) {{$shareInvestment->investingJoint->account_number}} @else {{$shareInvestment->user->account_number}} @endif</td>
                <td>${{$project->investment->total_projected_costs}}</td>
                <td>$<span class="modal_partial_repay_amount"></span></td>
              </tr>
            </tbody>
          </table>
          @endforeach
        </div>
        <br>
      </div>
      <div class="modal-footer">
        @if($balanceAudk)
        @if(isset(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->audk_default_project_id))
        @if($project->investment->total_projected_costs > $balanceAudk->balance)
        <button class="btn btn-default notifyUser">Notify buyer to load his wallet with AUDC to support repayment</button>
        @else
        <button type="button" class="btn btn-primary" id="submit_partial_repay_confirmation">Confirm</button>
        @endif
        @endif
        @endif
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

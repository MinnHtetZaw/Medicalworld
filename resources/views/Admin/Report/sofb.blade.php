@extends('master')
@section('title','Sofb')
@section('link','Sofb  List')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="mt-5">
                    <h3 class="text-center font-weight-bold">Medical World Co.Ltd</h3>
                    <p class="text-center ">Statement of financial position as at 31 Dec 2021</p>
                </div>
                <div class="">
                    <div class="">
                        <p class="font-weight-bold">Assets</p>
                        <p class="font-weight-bold">Non-Current Assets</p>
                    </div>
                </div>
                <hr class="">
                <div class="">


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date<th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">1</th>
                                <td>Software</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Office Equipment</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td >Furniture & Fitting</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td >Motor Vehicle</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Phone & Other</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td >Computer,Printer,Camera,CCTV</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Air Con & Equiment</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td >Generator</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td >Machine & Equipment</td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td >Accumulated Depreciation for NCA</td>
                                <td></td>
                                <td></td>

                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td class="font-weight-bold">Total Non-Current Assets</td>
                            </tr>

                            </tbody>
                        </table>

                </div>
                <div class="mt-5">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Current Assets</p>
                    </div>
                    <div class="">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Inventory-HO</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Inventory-SH</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Inventory-MDY</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td colspan="2">Inventory-Factory Raw</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td colspan="2">Inventory-Factory FG</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td colspan="2">Account Receivable-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td colspan="2">Account Receivable-SH</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td colspan="2">Account Receivable-MDY</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td colspan="2">Saving-YGN</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">10</th>
                                    <td colspan="2">Other Receivable Condo,Car rental 500000,bath 8639650</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td colspan="2">Advance</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td colspan="2">Other Receivable</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td colspan="2">Prepaid Room Rental</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td colspan="2">Cash in Hand-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td colspan="2">Cash in Bank-HO</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">16</th>
                                    <td colspan="2">Cash in Hand-SH</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td colspan="2">Cash in Hand-USD</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">18</th>
                                    <td colspan="2">Cash in Hand-Bath</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">19</th>
                                    <td colspan="2">Cash in Hand-MDY</td>
                                    <td></td>
                                </tr>

                                <hr class="border bottom-50 text-black">
                                <tr>
                                    <th scope="row">20</th>
                                    <td class="font-weight-bold">Total Current Assets</td>
                                </tr>
                                <tr>
                                    <th scope="row">21</th>
                                    <td class="font-weight-bold">Total  Assets</td>
                                </tr>

                                </tbody>
                            </table>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Liabilities</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Fabric</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Loan</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Non-Liabilities</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Other Payable</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Order</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ag-BMA Daw Hnin Hnin Deposit bank receipt</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Current MDY</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Current MDY-Expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Current-SH</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">7</th>
                                    <td class="font-weight-bold">
                                        Total Liabilities
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Equity</p>
                        </div>
                        <hr class="">
                        <div class="">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date<th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Issued Share Capital</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Retained Earnings</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <th scope="row">3</th>
                                    <td class="fw-bolder">
                                        Total Equity
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td class="font-weight-bold">
                                        Total Equity & Liabilities
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection


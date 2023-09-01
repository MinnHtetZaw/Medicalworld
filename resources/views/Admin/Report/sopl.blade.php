@extends('master')
@section('title','Sopl')
@section('link','Sopl  List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="mt-5">
                    <h3 class="text-center font-weight-bold">Medical World Co.Ltd</h3>
                    <p class="text-center">Statement of financial position as at 31 Dec 2021</p>
                </div>


                <div class="">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Revenue</p>
                    </div>
                </div>
                <hr class="">
                    <div class="">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount<th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">1</th>
                                <td>Sale-HO</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Sale-SH</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Sale_MDY</td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td colspan="2">Sale Return</td>
                                <td></td>
                                <td></td>


                            </tbody>
                        </table>
                    </div>

                <div class="mt-5">
                    <div class="">
                        <p class="text-decoration-underline font-weight-bold">Cost of Good Sold</p>
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
                                    <td>Opening Inventory</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>

                    <div class="mt-5">
                        <div class="">
                            <p class="font-weight-bold">Direct Cost</p>
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
                                    <td>Cost of Sale-HO</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Factory-Raw Material</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Closing WIP</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Closing Inventory</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td class="font-weight-bold">Gross Profit/(loss)</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td class="font-weight-bold">Other Income</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td class="font-weight-bold">Total Expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Marketing Expenses</p>
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
                                    <td>Marketing Expenses
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Advertising</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Travelling-Marketing</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Discount allowanced</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Gift & Present</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Commission</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td class="">
                                        Sample Charges
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">7</th>
                                    <td class="">
                                        Bonus
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Administrative Expenses</p>
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
                                    <td>Salary-HO</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Salary-SH</td>
                                    <td></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <th scope="row">3</th>
                                    <td class="">
                                        Salary-MDY
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td class="">
                                        Salary-Factory
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Phone Bill</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Professional fee</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Travelling expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Connection fee</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Transportation</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Internet Bill</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Meal Allowance</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Meter Bill</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>Office Expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td>Stationary & Printing expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td>Car Repair & Maintainance</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">16</th>
                                    <td>Diesel & Oil<td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td>Donation</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">18</th>
                                    <td>Entertainment</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">19</th>
                                    <td>Gate Fees</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">20</th>
                                    <td>Medical</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">21</th>
                                    <td>Repair & Maintainance</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">22</th>
                                    <td>Service fees</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">23</th>
                                    <td>Tax & YCDC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">24</th>
                                    <td>Training</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">25</th>
                                    <td>Room,Car Rental</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">26</th>
                                    <td>Fine</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">27</th>
                                    <td>Labour</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">28</th>
                                    <td>Uniform</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">29</th>
                                    <td>Sigboard</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">30</th>
                                    <td>Currency-exchange</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">31</th>
                                    <td>Other Expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">32</th>
                                    <td>Medical Allowance</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Finance Expenses</p>
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
                                    <td>Bank Charges</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Internet</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <p class="text-decoration-underline font-weight-bold">Factory Operation Expenses</p>
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
                                    <td>Factory-Diesel</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Factory-Internet</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Factory-Labour</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Factory-Office expenses</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Factory-Repair & Maintainance</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Factory-Sample</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td class="">
                                        Factory-Stationary & Printing
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">8</th>
                                    <td class="">
                                        Factory-YCDC tax
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td class="">
                                        Factory-Travelling
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td class="">
                                        Factory-Donation
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td class="">
                                        Factory-Medical
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td class="">
                                        Factory-Meter Bill
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td class="">
                                        Factory
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">14</th>
                                    <td class="">
                                        Cost of Sale
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15</th>
                                    <td class="">
                                        Outsources fee
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">16</th>
                                    <td class="">
                                        Amortization for Intangible Assets
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">17</th>
                                    <td class="">
                                        Depreciation for Tangible Assets
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th scope="row">18</th>
                                    <td class="font-weight-bold fs-5">
                                        Net Profit/(loss)
                                    </td>
                                    <td></td>
                                    <td></td>
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

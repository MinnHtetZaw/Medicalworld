@extends('master')
@section('title','Trial')
@section('link','Trial  List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mt-5 text-center">
                <p class="font-weight-bold  mt-5">Account Name</p>
            </div>
            <div class="mt-5">
                <div class="">
                    <p class="text-decoration-underline font-weight-bold">User Account</p>
                </div>
                <hr class="">
                <div class="">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Acc-Name</th>
                            <th scope="col">Nature</th>
                            <th scope="col">DR</th>
                            <th scope="col">CR<th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">101001</th>
                            <td>Software</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102001</th>
                            <td>Office Equipment</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102002</th>
                            <td>Furniture & Fitting</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102003</th>
                            <td>Motor Vehicle</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102004</th>
                            <td>Phone & Other</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102005</th>
                            <td>Computer,Printer,Camera,CCTV</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102006</th>
                            <td>Air Con & Cooler</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102007</th>
                            <td>Generator</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">102008</th>
                            <td>Machine & Equiment</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">103001</th>
                            <td>Accumulated Depreciation for NCA</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">104001</th>
                            <td>Inventory-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">104002</th>
                            <td>Inventory-SH</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">104003</th>
                            <td>Inventory-MDY</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">104003</th>
                            <td>Inventory-Factory Raw</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">104005</th>

                            <td>Inventory-Factory FG</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">105001</th>
                            <td>Account Receivable-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">105002</th>
                            <td>Account Receivable-SH</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">105003</th>
                            <td>Account Receivable-MDY</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">106001</th>
                            <td>Saving-YGN</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">106002</th>
                            <td>Other Receivable Condo,Car rental 500000,bath 8639650</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">106003</th>
                            <td>Advance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">106004</th>
                            <td>Other Receivable</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">106005</th>
                            <td>Prepaid Room REntal</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107001</th>
                            <td>Cash in Hand-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107002</th>
                            <td>Cash in Bank-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107003</th>
                            <td>Cash in Hand-SH</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107004</th>
                            <td>Cash in Hand-USD</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107005</th>
                            <td>Cash in Hand-Bath</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">107006</th>
                            <td>Cash in Hand-MDY</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">201001</th>
                            <td>Fabric</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">202001</th>
                            <td>Other payable</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">202002</th>
                            <td>Loan</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">202003</th>
                            <td>Order</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">202004</th>
                            <td>Ag-BMA Daw Hnin Hnin Lwin Deposit bank receipt</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">301001</th>
                            <td>Current MDY</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">301002</th>
                            <td>Current MDY-Expenses</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">301003</th>
                            <td>Current-SH</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">401001</th>
                            <td>Sale-HO</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">401002</th>
                            <td>Sale-SH</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">401003</th>
                            <td>Sale-MDY</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">401004</th>
                            <td>Sale Return</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">501001</th>
                            <td>Cost of Sale-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">501002</th>
                            <td>Cost of Sale-SH</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">501003</th>
                            <td>Cost of Sale-MDY</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">701001</th>
                            <td>Other Income</td>
                            <td>CR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801001</th>
                            <td>Marketing Expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801002</th>
                            <td>Advertising</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801003</th>
                            <td>Travelling-Marketing</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801005</th>
                            <td>Gift & present</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801006</th>
                            <td>Commission</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">801007</th>
                            <td>Sample Charges</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">802001</th>
                            <td>Bonus</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">802002</th>
                            <td>Salary-HO</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">802003</th>
                            <td>Salary-SH</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">802004</th>
                            <td>Salary-MDY</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">802005</th>
                            <td>Salary Factory</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803001</th>
                            <td>Phone Bill</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803002</th>
                            <td>Professional fee</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803003</th>
                            <td>Travelling expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803004</th>
                            <td>Connection fee</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803005</th>
                            <td>Transportation</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803006</th>
                            <td>Internet Bill</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803007</th>
                            <td>Meal Allowance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">803008</th>
                            <td>Meter Bill</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803009</th>
                            <td>Office expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803010</th>
                            <td>Stationary & Printing expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803011</th>
                            <td>Repair & Maintance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803012</th>
                            <td>Diesel & Oil</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803013</th>
                            <td>Donation</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803014</th>
                            <td>Entertainment</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803015</th>
                            <td>Gate Fees</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803016</th>
                            <td>Medical</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803017</th>
                            <td>Repair & Maintainance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803018</th>
                            <td>Service Fees</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803019</th>
                            <td>Tax & YCDC</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803020</th>
                            <td>Training</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803021</th>
                            <td>Room,Car Rental</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803022</th>
                            <td>Fine</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803023</th>
                            <td>Labour</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803024</th>
                            <td>Uniform</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803025</th>
                            <td>Sigboard</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803026</th>
                            <td>Currency exchange</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803027</th>
                            <td>Other expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">803028</th>
                            <td>Medical Allowance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">804001</th>
                            <td>Bank Charges</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">804002</th>
                            <td>Internet</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805001</th>
                            <td>Factory-Diesel</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">805002</th>
                            <td>Factory-Internet</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805003</th>
                            <td>Factory-Labour</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805004</th>
                            <td>Factory-Office expenses</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805005</th>
                            <td>Factory-Repair & Maintainance</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805006</th>
                            <td>Factory-Sample</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805007</th>
                            <td>Factory-Stationary & Printing</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805008</th>
                            <td>Factory-YCDC tax</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805009</th>
                            <td>Factory-Travelling</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805010</th>
                            <td>Factory-Donation</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805011</th>
                            <td>Factory-Medical</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805012</th>
                            <td>Factory-Meter Bill</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805013</th>
                            <td>Factory</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805014</th>
                            <td>Factory-Raw Material</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805015</th>
                            <td>Cost of Sale</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">805016</th>
                            <td>Outsources fee</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">806001</th>
                            <td>Amortization for Intangible Assets</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">806002</th>
                            <td>Depreciation for Tangible Assets</td>
                            <td>DR</td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

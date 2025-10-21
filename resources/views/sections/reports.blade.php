@extends('layouts.admin')
@section('title','REPORTS')
@section('content')
    <div class="p-4">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="border rounded-3 p-4 bg-white h-100">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="icon-badge">👨‍🎓</div>
                        <div class="fw-semibold">Student Reports</div>
                    </div>
                    <form class="vstack gap-3" onsubmit="event.preventDefault(); downloadStudentCsv();">
                        <select id="reportStudentCourse" class="form-select">
                            <option value="all">Course (All)</option>
                            <option value="CS">CS</option>
                            <option value="IT">IT</option>
                            <option value="IS">IS</option>
                        </select>
                        <select id="reportStudentDept" class="form-select">
                            <option value="all">Department (All)</option>
                            <option value="CSP">CSP</option>
                            <option value="BAP">BAP</option>
                            <option value="ASP">ASP</option>
                            <option value="THMP">THMP</option>
                            <option value="AP">AP</option>
                            <option value="ETP">ETP</option>
                            <option value="TEP">TEP</option>
                            <option value="CJEP">CJEP</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Download CSV</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="border rounded-3 p-4 bg-white h-100">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="icon-badge">🎓</div>
                        <div class="fw-semibold">Faculty Reports</div>
                    </div>
                    <form class="vstack gap-3" onsubmit="event.preventDefault(); downloadFacultyCsv();">
                        <select id="reportFacultyDept" class="form-select">
                            <option value="all">Department (All)</option>
                            <option value="CSP">CSP</option>
                            <option value="BAP">BAP</option>
                            <option value="ASP">ASP</option>
                            <option value="THMP">THMP</option>
                            <option value="AP">AP</option>
                            <option value="ETP">ETP</option>
                            <option value="TEP">TEP</option>
                            <option value="CJEP">CJEP</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Download CSV</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function downloadStudentCsv(){
        var c = document.getElementById('reportStudentCourse').value || 'all';
        var d = document.getElementById('reportStudentDept').value || 'all';
        window.location.assign('/api/reports/students.csv?course=' + encodeURIComponent(c) + '&dept=' + encodeURIComponent(d));
    }
    function downloadFacultyCsv(){
        var d = document.getElementById('reportFacultyDept').value || 'all';
        window.location.assign('/api/reports/faculty.csv?dept=' + encodeURIComponent(d));
    }
    </script>
@endsection



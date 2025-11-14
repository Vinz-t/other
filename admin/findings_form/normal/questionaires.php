<table class="table table-bordered table-striped">
    <thead class="text-center">
        <tr style="background-color: #007bff; color: white;">
            <th rowspan="2" style="width: 5%;">No.</th>
            <th rowspan="2" style="min-width: 400px;">Check Items</th>
            <th colspan="3" class="text-center border-bottom p-0">Answer</th>
            <th rowspan="2" style="min-width: 310px;">Evidence/<br>Remarks</th>
            <th rowspan="2" style="width: 15%;">Audit Finding Classification <p style="font-size:11px;">(MajNC, MinNC, OFI, P)</p></th>
            <th rowspan="2" style="width: 10%;">Occurrence <p style="font-size:12px;">(I, II, III)</p></th>
        </tr>
        <tr style="background-color: #007bff; color: white;">
            <th class="text-center" style="width: 5%; font-size:13px;">Yes</th>
            <th class="text-center" style="width: 5%; font-size:13px;">No</th>
            <th class="text-center" style="width: 5%; font-size:13px;">N/A</th>
        </tr>
    </thead>
    <tbody id="question-table-body">
        <!-- Section: Identification, Indication, Traceability, & Control of NG Parts -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section1')"><i class="mdi mdi-package-variant-closed me-1"></i> Identification, Indication, Traceability, & Control of NG Parts</td>
        </tr>
        <tbody id="section1" style="display: none;">
            <tr>
                <td class="fw-bold">1.</td>
                <td class="fw-bold">Are all rack items—including hold, pending, and training material—properly identified with correct traceability, following FIFO, and within the height limit?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_1" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_1" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_1" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">2.</td>
                <td class="fw-bold">Are each workstation clearly identified, defined, and marked?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_2" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_2" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_2" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">3.</td>
                <td class="fw-bold">Does the special workstation have a clear label or indication of its status (e.g., "Under Evaluation," "New Model," "Prototype")?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_3" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_3" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_3" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">4.</td>
                <td class="fw-bold">Is Label and segregation of Input, Output, NG being followed?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_4" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_4" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_4" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">5.</td>
                <td class="fw-bold">Does NG Tag/Label have correct details (e.g. defect type, disposition)?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_5" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_5" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_5" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">6.</td>
                <td class="fw-bold">Are all NG (non-good) parts properly arranged, placed in the designated location, and clearly identified with correct labels and traceability to prevent further damage?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_6" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_6" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_6" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>

        <!-- Section: Process-Prevention of Errors -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section2')"><i class="mdi mdi-hazard-lights me-1"></i> Process-Prevention of Errors</td>
        </tr>
        <tbody id="section2" style="display: none;">
            <tr>
                <td class="fw-bold">7.</td>
                <td class="fw-bold">Are the units/items being handled correctly and in the proper orientation?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_7" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_7" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_7" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">8.</td>
                <td class="fw-bold">Method of loading/unloading unit correct?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_8" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_8" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_8" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">9.</td>
                <td class="fw-bold">Does production conduct sampling/frequency inspection? Sampling Size was followed?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_9" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_9" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_9" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">10.</td>
                <td class="fw-bold">Are all tools, jigs, and equipment properly maintained, in good condition, and calibrated?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_10" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_10" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_10" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">11.</td>
                <td class="fw-bold">Does the master/reference/limit sample used is still in Good condition?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_11" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_11" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_11" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">12.</td>
                <td class="fw-bold">Are the machine settings being followed and within the set parameters?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_12" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_12" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_12" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">13.</td>
                <td class="fw-bold">Is the operating procedure followed correctly?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_13" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_13" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_13" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">14.</td>
                <td class="fw-bold">Are all chemicals being used within their expiration dates?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_14" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_14" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_14" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">15.</td>
                <td class="fw-bold">Are the checksheet, datasheet, and run card  filled out completely and correctly?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_15" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_15" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_15" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>
        <!-- Section: Control of Records -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section3')"><i class="mdi mdi-camera-control me-1"></i> Control of Records</td>
        </tr>
        <tbody id="section3" style="display: none;">
            <tr>
                <td class="fw-bold">16.</td>
                <td class="fw-bold">Do Checksheet, Product specifications, ISI, Guidelines, and procedure for the machine/workstation match the model being processed, and are they readily available, controlled, and registered?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_16" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_16" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_16" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">17.</td>
                <td class="fw-bold">Does MSDS available at the chemical storage?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_17" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_17" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_17" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">18.</td>
                <td class="fw-bold">Does the document/checksheet match the registered version?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_18" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_18" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_18" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>
        <!-- Section: Worker Competence -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section4')"><i class="mdi mdi-account-hard-hat me-1"></i> Worker Competence</td>
        </tr>
        <tbody id="section4" style="display: none;">
            <tr>
                <td class="fw-bold">19.</td>
                <td class="fw-bold">Worker understand his/ her proces?  ( auditor may ask random question about procedure indicated on the work instruction/guidelines).</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_19" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_19" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_19" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">20.</td>
                <td class="fw-bold">Does worker have approriate certification in her process assignment?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_20" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_20" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_20" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">21.</td>
                <td class="fw-bold">Is the worker aware of the exact location of work procedure/master sample/limit sample?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_21" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_21" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_21" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">22.</td>
                <td class="fw-bold">Is the operator following proper protocol (e.g. not wearing jewelry or cosmetics) in the production area?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_22" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_22" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_22" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>
        <!-- Section: 6S -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section5')"><i class="mdi mdi-autorenew"></i> 6S</td>
        </tr>
        <tbody id="section5" style="display: none;">
            <tr>
                <td class="fw-bold">23.</td>
                <td class="fw-bold">Is the workstation well-organized, free of hazards, and are all personal belongings properly stored?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_23" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_23" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_23" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">24.</td>
                <td class="fw-bold">Are all materials, tools, and equipment properly stored, cleaned, and maintained?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_24" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_24" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_24" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">25.</td>
                <td class="fw-bold">Are safety and caution labels present on the machine?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_25" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_25" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_25" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">26.</td>
                <td class="fw-bold">Is required PPE readily available and used according to requirement?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_26" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_26" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_26" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">27.</td>
                <td class="fw-bold">Are employees aware of the location of fire extinguishers and emergency exits in their work area?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_27" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_27" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_27" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">28.</td>
                <td class="fw-bold">Are all potentially hazardous areas marked, and are all chemicals correctly labeled with the appropriate hazard symbols and pictograms?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_28" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_28" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_28" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>
        <!-- Section: Environment -->
        <tr class="bg-info section_title">
            <td colspan="9" class="text-center text-white pt-2 pb-2" onclick="toggleSection('section6')"><i class="mdi mdi-sprout me-1"></i> Environment</td>
        </tr>
        <tbody id="section6" style="display: none;">
            <tr>
                <td class="fw-bold">29.</td>
                <td class="fw-bold">Are all environmental parameters (luminance, temperature, APC, and humidity) in the area controlled, monitored, and within specified limits?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_29" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_29" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_29" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
            <tr>
                <td class="fw-bold">30.</td>
                <td class="fw-bold">There is no non-cleanroom material inside cleanroom area?</td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_30" value="yes"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_30" value="no"></td>
                <td class="text-center"><input type="radio" class="form-check-input" name="finding_30" value="na"></td>
                <td>
                    <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                    <input type="file" class="form-control form-control-sm border-0 mt-2 proof" accept="application/pdf" onchange="validateFileSize(this)"/>
                </td>
                <td><select class="form-control form-control-sm classification"></select></td>
                <td><select class="form-control form-control-sm occurrence"></select></td>
            </tr>
        </tbody>
    </tbody>
</table>

<script>
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.style.display = section.style.display === 'none' ? 'table-row-group' : 'none';
    }

    // Add cursor pointer style to section titles
    document.addEventListener('DOMContentLoaded', function() {
        const sectionTitles = document.querySelectorAll('.section_title td');
        sectionTitles.forEach(title => {
            title.style.cursor = 'pointer';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const classificationOptions = {
            yes: [
                { value: '', text: 'Select', disabled: true, selected: true },
                { value: 'P', text: 'P', isSelected: false, isDisabled: false }
            ],
            no: [
                { value: '', text: 'Select', disabled: true, selected: true },
                { value: 'MajNC', text: 'MajNC', isSelected: false, isDisabled: false },
                { value: 'OFI', text: 'OFI', isSelected: false, isDisabled: false },
                { value: 'MinNC', text: 'MinNC', isSelected: false, isDisabled: false }
            ]
        };

        const occuresOptions = [
            { value: '', text: 'Select', disabled: true, selected: true },
            { value: 'I', text: 'I' },
            { value: 'II', text: 'II' },
            { value: 'III', text: 'III' },
        ];

        function setOptions(select, options) {
            if (!select) return;
            select.innerHTML = '';
            options.forEach(opt => {
                const o = document.createElement('option');
                o.value = opt.value;
                o.textContent = opt.text;
                if (opt.disabled) o.disabled = true;
                if (opt.selected) o.selected = true;
                select.appendChild(o);
            });
        }

        const findingNames = Array.from(document.querySelectorAll('input[name^="finding_"]')).map(input => parseInt(input.name.split('_')[1]));
        const maxFindingNumber = Math.max(...findingNames);

        // Add change event listeners to all radio buttons for findings 1-30
        for(let i = 1; i <= maxFindingNumber; i++) {
            const radioButtons = document.querySelectorAll(`input[name="finding_${i}"]`);
            const row = radioButtons[0]?.closest('tr');
            if (!row) continue;
            
            const classificationSelect = row.querySelector('select.classification');
            const occurrenceSelect = row.querySelector('select.occurrence');
            if (!classificationSelect || !occurrenceSelect) continue;

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Clear existing options
                    classificationSelect.innerHTML = '';
                    occurrenceSelect.innerHTML = '';
                    
                    if (this.value === 'yes') {
                        // If "Yes" is selected, show only P option
                        setOptions(classificationSelect, classificationOptions.yes);// classifyOptionsForYes);
                    } else if (this.value === 'no') {
                        // If "No" is selected, show MNC, OFI, MHNC options
                        setOptions(classificationSelect, classificationOptions.no);// classifyOptionsForNo);
                        setOptions(occurrenceSelect, occuresOptions);
                    }
                });
            });
        }

        // Populate the specific id selects
        // setOptions(document.getElementById('classify'), classifyOptions);
        // setOptions(document.getElementById('occures'), occuresOptions);

        // this commonlly used code -------------
        // Ensure all selects with the classification/occurrence classes have the same options
        //document.querySelectorAll('select.classification').forEach(s => setOptions(s, classifyOptions));
        //document.querySelectorAll('select.occurrence').forEach(s => setOptions(s, occuresOptions));
    });
</script>

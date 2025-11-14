const driver = new Driver({
    animate: true,
    opacity: 0.75,
    padding: 10,

    allowClose: false,
    overlayClickNext: false,
    keyboardControl: true,

    doneBtnText: 'Finish Tour',
    closeBtnText: 'Exit Tour',
    nextBtnText: 'Next Step',
    prevBtnText: 'Previous Step',
});

function getStepText(stepIndex, totalSteps) {
    return `Step: ${stepIndex + 1} of ${totalSteps}`;
}

driver.defineSteps([
    {
        element: '#Division_Holder',
        popover: {
            title: 'Auditee Division',
            description: `Select the division being audited from this dropdown menu.<br><br><em>${getStepText(0, 6)}</em>`,
            position: 'bottom'
        }
    },
    {
        element: '#Auditee_Holder',
        popover: {
            title: 'Auditee',
            description: `Choose the specific auditee based on the selected division.<br><br><em>${getStepText(1, 6)}</em>`,
            position: 'bottom'
        }
    },
    {
        element: '#Choices_Holder',
        popover: {
            title: 'Audit Area / Process',
            description: `Select up to 10 areas or processes to be audited from this multi-select field.<br><br><em>${getStepText(2, 6)}</em>`,
            position: 'top'
        }
    },
    {
        element: '#Auditor_Holder',
        popover: {
            title: 'Auditor',
            description: `This field displays the name of the auditor conducting the audit.<br><br><em>${getStepText(3, 6)}</em>`,
            position: 'bottom'
        }
    },
    {
        element: '#Category_Holder',
        popover: {
            title: 'Category',
            description: `Select the category of the audit from this dropdown menu.<br><br><em>${getStepText(4, 6)}</em>`,
            position: 'top'
        }
    },
    {
        element: '#Date_Shift_Holder',
        popover: {
            title: 'Audit Date & Shift',
            description: `Choose the date of the audit and the corresponding shift from these fields.<br><br><em>${getStepText(5, 6)}</em>`,
            position: 'top'
        }
    }
]);


$('#help_btn').on('click', function () {
        //alert('Help is on the way!');
        //driver.start();
        driver.start();
    });

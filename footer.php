</div>
<?php wp_footer()
?>
<script>
    function buttonEvent(button) {
        button.onclick = (e) => {
            e.preventDefault()
            let id = button.getAttribute("id")
            if (choice[id] === undefined) choice[id] = 0
            choice[id] += 1
            button.textContent = `${id}(${choice[id]})`
            formatLog()
        }
    }

    function formatLog() {
        let text = ""
        for(let c in choice) {
            text += `${choice[c]}${c} + `
        }
        logs.textContent = text.slice(0, text.length - 2)
        document.querySelector("input#gameData").value = JSON.stringify(choice)
        logs.appendChild(launchButton)
    }

    

    let buttons = Array.from(document.querySelectorAll('.grid-row .column'))
    let choice = {}
    let logs = document.querySelector('p#logs')
    
    let launchButton = document.querySelector('#submit')
    buttons.forEach(buttonEvent)
</script>
</body>

</html>
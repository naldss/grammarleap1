<!DOCTYPE html>
<html lang="en">

@include('partials.head')
<title>GrammarLeap - POS Hunter</title>

<body id="">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            @include('partials.header')

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="posh-container">

                    <div class="start col-lg-8">
                        <div class="user-level text-gray-900">
                            <div class="level-circle">
                                <div class="level-num">1</div>
                                <div class="level-text">Mastery Level</div>
                            </div>
                            <!-- Progress Bar -->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="min-width: 9%; width: 46%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <div class="user-points text-s  mt-1 text-gray-800">146 points</div>
                        </div>
                        <div class="play bg-gradient-success" id="play-game">
                            Play Game
                        </div>

                    </div>
                    <div class="leaderboard col-lg-4 bg-gradient-primary">
                        <div class="leaderboard-title text-lg">
                            Top 20 Users in POS Hunter
                        </div>
                        <div class="leaderboard-list">
                            <div class="leaderbord-user ">
                                <div class="leaderboard-place">
                                    1
                                </div>
                                Naldwin Cuengco
                                <div class="points">43 points</div>
                            </div>
                            <div class="leaderbord-user" style="background-color: #4e72df49">
                                <div class="leaderboard-place">
                                    2
                                </div>
                                John Doe
                                <div class="points">43 points</div>
                            </div>
                        </div>
                    </div>




                    <div class="game">

                        <div class="sentence-container col-lg-10">
                            <div id="display-sentence" class="sentence ">No sentence passed.</div>
                            <div id="instruction" class="instruction text-gray-700">
                                No random POS tag is passed.
                            </div>
                        </div>
                        <div class="buttons-container col-lg-1">
                            <div id="submit" class="submit game-button bg-gradient-primary">Submit</div>
                            <div class="exit game-button bg-gradient-danger">Exit</div>
                        </div>

                    </div>

                    <div class="correct-answer">
                        <div>Parts of Speech Analysis:</div>
                        <div id="wordsPos"></div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('partials.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('auth.logout')
</body>
{{-- <script src="https://unpkg.com/compromise"></script> --}}
<script>
    let partsOfSpeech = ["Noun", "Pronoun", "Verb", "Adjective", "Adverb", "Preposition", "Conjunction",
        "Interjection"
    ];
    let sentences = @json($sentences);
    let currentIndex = 0;
    let correct = 0;
    let incorrect = 0;
    let score = 0;


    document.getElementById('play-game').addEventListener('click', function() {
        loadGame();
    });

    function loadGame() {
        console.log(' ');
        console.log(' ');
        console.log(currentIndex);
        if (currentIndex < sentences.length) {
            document.querySelector('.start').style.display = 'none';
            document.querySelector('.leaderboard').style.display = 'none';
            document.querySelector('.game').style.display = 'flex';

            //the sentence
            let sentence = sentences[currentIndex].sentence;
            console.log(sentence);

            //Select Random Tag in the sentence
            let sentenceWordTags = [];
            let words1 = sentence.split(' ');
            words1.forEach(function(word) {
                let wordTag = nlp(word);
                let tags = wordTag.out('tags')[0];
                let wordTags = tags ? tags.tags : []; // Ensure tags exist

                // Find the first tag that matches partsOfSpeech and push it if found
                let matchingTag = wordTags.find(tag => partsOfSpeech.includes(tag));
                if (matchingTag) {
                    sentenceWordTags.push(matchingTag);
                }
            });

            if (sentenceWordTags.length > 0) {
                randomTag = sentenceWordTags[Math.floor(Math.random() * sentenceWordTags.length)];
                console.log("Randomly selected tag:", randomTag);

                const instruction = document.getElementById('instruction');
                instruction.innerHTML = "Select the words that are '" + randomTag + "' in the sentence.";

            } else {
                console.log("No matching tags found in the specified parts of speech.");
            }
            //End of Select Random Tag in the sentence

            selectedWord = [];

            //display the sentence with classes and select function
            const words = sentence.split(' ');
            const sentenceDisplay = document.getElementById('display-sentence');
            sentenceDisplay.innerHTML = '';
            words.forEach((word, index) => {
                const wordSpan = document.createElement('span');
                wordSpan.textContent = word;
                wordSpan.classList.add('word');
                wordSpan.onclick = () => selectWord(index);
                sentenceDisplay.appendChild(wordSpan);
            });
            //end of display the sentence with classes


            //process the words in the sentence to extract POS for display of pos of words
            const tagsOfEachWords = [];
            words.forEach((word) => {
                const wordTag = nlp(word);
                const tags = wordTag.out('tags')[0];
                const wordTags = tags ? tags.tags : [];

                const intersection1 = wordTags.filter(tag => partsOfSpeech.includes(tag));
                const firstTag = intersection1.length > 0 ? intersection1[0] : null;

                tagsOfEachWords.push({
                    word: word,
                    tags: firstTag
                });
            });
            console.log(tagsOfEachWords);
            //end of process the words in the sentence to extract POS for display of pos of words


            // Remove existing event listeners from the #submit button
            const submitButton = document.getElementById('submit');
            const newSubmitButton = submitButton.cloneNode(true); // Create a new button to replace the old one
            submitButton.replaceWith(newSubmitButton);

            // Add event listener to the newly created button
            newSubmitButton.addEventListener('click', () => {
                const {
                    matched,
                    notMatched,
                    numOfOccurences
                } = checkSelectedWords(sentence, randomTag);

                if (currentIndex < sentences.length) {
                    correct += matched;
                    incorrect += notMatched;
                    score += (correct - incorrect);
                    if (score < 0) {
                        score = 0;
                    }
                    console.log("Your Score is: " + score);
                    correct = 0;
                    incorrect = 0;

                    currentIndex++;
                }

                document.querySelector('.game').style.display = 'none';
                document.querySelector('.correct-answer').style.display = 'flex';
                let wordsPosElement = document.getElementById('wordsPos');
                wordsPosElement.innerHTML = ''; // Clear any existing content

                tagsOfEachWords.forEach(({
                    word,
                    tags
                }) => {
                    // Create a new element to display each word and its tag
                    let wordDisplay = document.createElement('div');
                    wordDisplay.textContent = `${word} - ${tags}`; // Format: "Word - Tag"

                    // Append the word display to the container
                    wordsPosElement.appendChild(wordDisplay);
                });


                // loadGame();
            });
        } else {
            console.log('you reached the end');
        }
    }


    function selectWord(index) {
        const words = document.querySelectorAll('.word');
        const wordElement = words[index];

        if (wordElement.classList.contains('selected')) {
            // If the word is already selected, deselect it and remove from the array
            wordElement.classList.remove('selected');
            selectedWord = selectedWord.filter((i) => i !== index);
        } else {
            // Select the clicked word and add to the array
            wordElement.classList.add('selected');
            selectedWord.push(index);
        }
    }

    function checkSelectedWords(sentence, randomTag) {
        let correct = 0;
        let incorrect = 0;
        let numberOccur = nlp(sentence)
            .match(`#${randomTag}`)
            .length;

        // Loop through each selected word index
        selectedWord.forEach((index) => {
            const word = document.querySelectorAll('.word')[index].textContent;

            // Use compromise NLP library to analyze the word
            let taggedWord = nlp(word);

            // Check if the word contains the required tag
            if (taggedWord.has(`#${randomTag}`)) {
                correct++; // Increment 'a' for match
            } else {
                incorrect++; // Increment 'b' for non-match
            }
        });

        return {
            matched: correct,
            notMatched: incorrect,
            numOfOccurences: numberOccur
        };
    }
</script>

</html>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

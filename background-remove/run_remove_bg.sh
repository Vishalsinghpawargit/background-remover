#!/bin/bash

# Get the absolute path of the script directory (where the script is located)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Correct path to the virtual environment (no need for `../`)
VENV_PATH="$SCRIPT_DIR/venv/bin/activate"

# Absolute path to the Python script
PYTHON_SCRIPT_PATH="$SCRIPT_DIR/remove_bg.py"

# Get the arguments passed to the shell script
INPUT_IMAGE="$1"
INPUT_FOLDER="$2"
OUTPUT_FOLDER="$3"

# Debugging: Check the paths being used
echo "Using virtual environment: $VENV_PATH"
echo "Using Python script: $PYTHON_SCRIPT_PATH"

# Ensure the virtual environment exists before activating
if [ ! -f "$VENV_PATH" ]; then
    echo "Virtual environment not found at $VENV_PATH"
    exit 1
fi

# Ensure the Python script exists
if [ ! -f "$PYTHON_SCRIPT_PATH" ]; then
    echo "Python script not found at $PYTHON_SCRIPT_PATH"
    exit 1
fi

# Activate the virtual environment
source $VENV_PATH

# Run the Python script
python3 $PYTHON_SCRIPT_PATH "$INPUT_IMAGE" "$INPUT_FOLDER" "$OUTPUT_FOLDER"

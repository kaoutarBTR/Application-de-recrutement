import sys
from pdfminer.high_level import extract_text
from cv_module import CV_class

# Ensure correct usage
if len(sys.argv) < 3:
    print("Usage: python CV.py <path_to_pdf> <preferences>")
    sys.exit(1)

# Extract command-line arguments
pdf_path = sys.argv[1]
preferences = sys.argv[2]

# Extract text from the PDF file
try:
    text = extract_text(pdf_path)
except Exception as e:
    print("An error occurred while extracting text from the PDF:", e)
    sys.exit(1)

# Create an instance of CV_class and extract sections
cv = CV_class()
cv.extract_values(text)

# Define preferences
constraints = preferences.split(";")
constraints = constraints[:-1]

# Calculate total score
total_score = cv.calculate_total_score(constraints)
print(total_score)
